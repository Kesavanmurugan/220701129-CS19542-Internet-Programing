<?php
session_start(); // Start the session to access user information

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studentvote1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $candidateId = $_POST['candidate_id']; // Get candidate ID from the request
    $userId = $_SESSION['user_id']; // Get the user ID from the session

    // Update the voted status and voted_For column in the users table
    $updateQuery = "UPDATE users SET voted = 1, voted_For = ? WHERE id = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("ii", $candidateId, $userId);
    
    if ($stmt->execute()) {
        // If the vote is successfully recorded
        // Also, update the vote count for the candidate
        $incrementVoteQuery = "UPDATE candidate SET votecount = votecount + 1 WHERE id = ?";
        $incrementStmt = $conn->prepare($incrementVoteQuery);
        $incrementStmt->bind_param("i", $candidateId);
        $incrementStmt->execute();
        $incrementStmt->close();

        echo json_encode(['success' => true, 'message' => 'Vote recorded successfully!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error recording your vote.']);
    }

    $stmt->close();
}

$conn->close();
?>
