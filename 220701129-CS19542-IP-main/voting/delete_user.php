<?php
$conn = new mysqli("localhost", "root", "", "studentvote1");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['id'])) {
    $userId = $_POST['id'];

    // First, get the candidate ID this user voted for
    $getVoteQuery = "SELECT voted_For FROM users WHERE id = ?";
    $stmt = $conn->prepare($getVoteQuery);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $voteData = $result->fetch_assoc();

    if ($voteData) {
        $candidateId = $voteData['voted_For'];

        // Decrement the vote count for the corresponding candidate
        $updateVoteCountQuery = "UPDATE candidate SET votecount = votecount - 1 WHERE id = ?";
        $voteStmt = $conn->prepare($updateVoteCountQuery);
        $voteStmt->bind_param("i", $candidateId);
        $voteStmt->execute();
        $voteStmt->close();
    }

    // Now delete the user
    $deleteQuery = "DELETE FROM users WHERE id = ?";
    $deleteStmt = $conn->prepare($deleteQuery);
    $deleteStmt->bind_param("i", $userId);
    if ($deleteStmt->execute()) {
        echo "User deleted successfully.";
    } else {
        echo "Error deleting user: " . $deleteStmt->error;
    }

    $deleteStmt->close();
}

$conn->close();
?>
