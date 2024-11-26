<?php
$servername = "localhost"; // Your server name
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "studentvote1"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Define maximum votes allowed
$maxVotes = 10; // Adjust as needed

// Check and update voting status for each candidate
$sql = "SELECT id, votecount FROM candidate";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($row['votecount'] >= $maxVotes) {
            // Close voting for this candidate
            $updateSql = "UPDATE candidate SET is_voting_open = FALSE WHERE id = " . $row['id'];
            $conn->query($updateSql);
        }
    }
}

$conn->close();
?>
