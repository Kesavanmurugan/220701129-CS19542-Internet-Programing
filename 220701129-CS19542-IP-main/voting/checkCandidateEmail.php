<?php
$servername = "localhost"; // Your server name
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "studentvote1"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];

// Check if the Email exists
$emailExistsQuery = "SELECT * FROM candidate WHERE email='$email'"; // Make sure this table name is correct
$emailResult = $conn->query($emailExistsQuery);
$emailExists = $emailResult->num_rows > 0;

echo json_encode(['emailExists' => $emailExists]);

$conn->close();
?>
