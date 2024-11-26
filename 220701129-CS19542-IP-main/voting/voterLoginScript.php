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
$pass_word = $_POST['password'];

// Check if voter exists
$sql = "SELECT * FROM users WHERE studentId='$sid' AND pass_word='$pass_word'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $_SESSION['voter_id'] = $sid;  // Set session for logged-in user
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false]);
}

$conn->close();
?>
