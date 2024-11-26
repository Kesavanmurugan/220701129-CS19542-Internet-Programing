<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studentvote1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sid = $_POST['sid'];
$email = $_POST['email'];

// Check if the Student ID exists
$sidExistsQuery = "SELECT * FROM users WHERE studentId='$sid'";
$sidResult = $conn->query($sidExistsQuery);
$sidExists = $sidResult->num_rows > 0;

// Check if the Email exists
$emailExistsQuery = "SELECT * FROM users WHERE email='$email'";
$emailResult = $conn->query($emailExistsQuery);
$emailExists = $emailResult->num_rows > 0;

echo json_encode(['sidExists' => $sidExists, 'emailExists' => $emailExists]);

$conn->close();
?>
