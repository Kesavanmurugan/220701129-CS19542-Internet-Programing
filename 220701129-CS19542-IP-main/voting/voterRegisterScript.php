<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studentvote1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Capture form data
$name = $_POST['name'];
$sid = $_POST['sid'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$department = $_POST['department'];
$pass_word = $_POST['password'];

// Insert into users table
$sql = "INSERT INTO users (name, studentId, pass_word, mobileNumber, department, email, voted) 
        VALUES ('$name', '$sid', '$pass_word', '$contact', '$department', '$email', 0)";

if ($conn->query($sql) === TRUE) {
    echo "New voter registered successfully";
    header("Location: voterLogin.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
