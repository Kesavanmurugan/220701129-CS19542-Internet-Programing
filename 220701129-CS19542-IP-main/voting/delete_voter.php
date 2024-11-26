<?php
// Start session to ensure admin access
session_start();

// Ensure the user is an admin
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
    echo "You do not have permission to delete voters.";
    exit;
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studentvote1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the voter id from the request
$id = $_POST['id'];

// Delete the voter from the 'users' table
$sql = "DELETE FROM users WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Voter deleted successfully";
} else {
    echo "Error deleting voter: " . $conn->error;
}

$conn->close();
?>
