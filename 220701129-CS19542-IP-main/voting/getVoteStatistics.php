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

// Query to get the total number of voters
$totalVotersResult = $conn->query("SELECT COUNT(*) as total FROM users");
$totalVotersRow = $totalVotersResult->fetch_assoc();
$totalVoters = $totalVotersRow['total'];

// Query to get the total number of votes cast
$totalVotesResult = $conn->query("SELECT COUNT(*) as total FROM users WHERE voted = 1");
$totalVotesRow = $totalVotesResult->fetch_assoc();
$totalVotes = $totalVotesRow['total'];

// Prepare the response
$response = [
    'totalVoters' => (int)$totalVoters,
    'totalVotes' => (int)$totalVotes
];

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);

$conn->close();
?>
