<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studentvote1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get login form data
$sid = $_POST['sid'];
$email = $_POST['email'];
$pass_word = $_POST['password'];

// Check if voter exists
$sql = "SELECT * FROM users WHERE studentId='$sid' AND email='$email' AND pass_word='$pass_word'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    // Store user ID in session for later use
    $_SESSION['user_id'] = $user['id'];

    // Check if the user has already voted
    if ($user['voted'] == 1) {
        echo json_encode(['success' => true, 'voted' => true]);
    } else {
        echo json_encode(['success' => true, 'voted' => false]);
    }
} else {
    echo json_encode(['success' => false]);
}

$conn->close();
?>
