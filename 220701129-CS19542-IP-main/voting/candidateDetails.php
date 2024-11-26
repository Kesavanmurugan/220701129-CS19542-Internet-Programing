<?php
// Database connection parameters
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

// Get candidate ID from URL
$candidate_id = $_GET['id'];

// Fetch candidate details
$stmt = $conn->prepare("SELECT * FROM candidate WHERE id = ?");
$stmt->bind_param("i", $candidate_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $candidate = $result->fetch_assoc();
    // Display candidate details here (e.g., name, department, projects, etc.)
} else {
    echo "Candidate not found.";
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidate Details</title>
    <link href="https://fonts.googleapis.com/css?family=Secular+One|Roboto&display=swap" rel="stylesheet">
    <style>
        /* Add your CSS styles here */
    </style>
</head>
<body>
    <h1>Candidate Details</h1>
    <!-- Display candidate information here -->
</body>
</html>
