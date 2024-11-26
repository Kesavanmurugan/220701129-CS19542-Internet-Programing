<?php
$servername = "localhost"; // Adjust if needed
$username = "root"; // Adjust if needed
$password = ""; // Adjust if needed
$dbname = "studentvote1"; // Make sure this is correct

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$password = $_POST['password'];
$dept=$_POST['dept'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO candidate (name, email, contact,password, dept) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $contact,$password,$dept);

// Execute the statement
if ($stmt->execute()) {
    echo "Candidate registered successfully.";
} else {
    // Log detailed error message
    error_log("Insert Error: " . $stmt->error); // Log the error
    echo "Error: " . $stmt->error; // Return error message
}

// Close connections
$stmt->close();
$conn->close();
?>
