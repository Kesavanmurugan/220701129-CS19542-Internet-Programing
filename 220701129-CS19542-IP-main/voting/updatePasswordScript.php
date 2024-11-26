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
$new_password = $_POST['new_password'];

$sql = "UPDATE users SET pass_word='$new_password' WHERE studentId='$sid'";
if ($conn->query($sql) === TRUE) {
    echo "Password updated successfully";
} else {
    echo "Error updating password: " . $conn->error;
}

$conn->close();
?>
