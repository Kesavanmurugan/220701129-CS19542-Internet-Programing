<?php
session_start(); // Start the session to access user information

// Database connection
$servername = "localhost"; // Your server name
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "studentvote1";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch total number of voters
$totalVotersQuery = "SELECT COUNT(*) as total_voters FROM users"; // Total users eligible to vote
$totalVotersResult = $conn->query($totalVotersQuery);
$totalVoters = $totalVotersResult->fetch_assoc()['total_voters'];

// Fetch total votes count from the candidate table
$totalVotesQuery = "SELECT SUM(votecount) as total_votes FROM candidate"; // Total votes cast
$totalVotesResult = $conn->query($totalVotesQuery);
$totalVotes = $totalVotesResult->fetch_assoc()['total_votes'];

// Fetch threshold value from settings
$thresholdQuery = "SELECT value FROM settings WHERE name = 'vote_percentage_threshold'";
$thresholdResult = $conn->query($thresholdQuery);
$thresholdValue = $thresholdResult->fetch_assoc()['value']; // This should be in percentage

// Initialize variables
$totalVotePercentage = 0;

// Calculate total votes percentage
if ($totalVoters > 0 && $totalVotes==$thresholdValue) {
    $totalVotePercentage = ($totalVotes / $totalVoters) * 100;
}

// Initialize winner variable
$winner = null;

// Check if voting is complete and meets the threshold
if ($totalVotes === $totalVoters && $totalVotePercentage >= $thresholdValue) {
    // Fetch the winner from candidate table
    $winnerQuery = "SELECT name, votecount FROM candidate ORDER BY votecount DESC LIMIT 1"; // Get the candidate with the highest vote count
    $winnerResult = $conn->query($winnerQuery);
    $winner = $winnerResult->fetch_assoc();
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting Results</title>
    <link href="https://fonts.googleapis.com/css?family=Secular+One|Roboto&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #A7C6ED, #E3F2FD);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            text-align: center;
        }

        h1 {
            font-family: 'Secular One', sans-serif;
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .message-container {
            background-color: rgba(0, 0, 0, 0.6);
            padding: 40px;
            border-radius: 20px;
            max-width: 500px;
            width: 100%;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }

        a.button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            background: linear-gradient(45deg, #ff6b6b, #f94d6a);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1.2rem;
            text-decoration: none;
            transition: background 0.3s ease;
        }

        a.button:hover {
            background: linear-gradient(45deg, #ff9234, #ffcd3c);
        }
    </style>
</head>
<body>

    <div class="message-container">
        <?php if ($totalVotes === $totalVoters && $totalVotePercentage >= $thresholdValue): ?>
            <h1>Winner Announced!</h1>
            <p>Winner: <?php echo $winner['name']; ?></p>
            <p>Vote Count: <?php echo $winner['votecount']; ?></p>
            <a href="results.php" class="button">View All Results</a> <!-- Redirect to results page -->
        <?php else: ?>
            <h1>Voting Under Process</h1>
            <p>Voting is still ongoing. Please check back later for results.</p>
            <a href="home.php" class="button">Return to Home</a>
        <?php endif; ?>
    </div>

</body>
</html>
