<?php
session_start(); // Start the session to access user information

// Database connection
$servername = "localhost"; // Your server name
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "studentvote1"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch total number of voters who have voted
$totalVotersQuery = "SELECT COUNT(*) as total_voters FROM users WHERE voted = 1"; // Only count voters who have voted
$totalVotersResult = $conn->query($totalVotersQuery);
$totalVoters = $totalVotersResult->fetch_assoc()['total_voters'];

// Fetch total vote count from the candidate table
$totalVotesQuery = "SELECT SUM(votecount) as total_votes FROM candidate"; // Adjust based on your actual schema
$totalVotesResult = $conn->query($totalVotesQuery);
$totalVotes = $totalVotesResult->fetch_assoc()['total_votes'];

// Fetch winner information if voting is complete
$winner = null;
if ($totalVoters === $totalVotes) {
    // Fetch the winner from candidate table
    $winnerQuery = "SELECT name, votecount FROM candidate ORDER BY votecount DESC LIMIT 1"; // Get the candidate with the highest vote count
    $winnerResult = $conn->query($winnerQuery);
    $winner = $winnerResult->fetch_assoc();
}

// Fetch all candidates for display
$candidatesQuery = "SELECT name, votecount FROM candidate";
$candidatesResult = $conn->query($candidatesQuery);

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
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            text-align: center;
            padding: 20px;
        }

        h1 {
            font-family: 'Secular One', sans-serif;
            font-size: 2.5rem;
            margin-bottom: 20px;
            animation: fadeIn 1s;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .message-container {
            background-color: rgba(0, 0, 0, 0.6);
            padding: 40px;
            border-radius: 20px;
            max-width: 600px;
            width: 100%;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            animation: slideIn 0.5s;
        }

        @keyframes slideIn {
            from { transform: translateY(-20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            text-align: left;
            transition: background 0.3s ease;
        }

        th {
            background-color: rgba(0, 0, 0, 0.7);
        }

        td {
            background-color: rgba(0, 0, 0, 0.5);
        }

        td:hover {
            background-color: rgba(255, 107, 107, 0.3); /* Highlight on hover */
        }

        .winner {
            font-size: 1.5rem;
            font-weight: bold;
            color: #ffcd3c;
            margin-top: 20px;
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
        <h1>Voting Results</h1>
        
        <?php if ($totalVoters === $totalVotes): ?>
            <p class="winner">Winner: <?php echo $winner['name']; ?></p>
            <p>Vote Count: <?php echo $winner['votecount']; ?></p>
        <?php else: ?>
            <h1>Voting Under Process</h1>
            <p>Voting is still ongoing. Please check back later for results.</p>
        <?php endif; ?>

        <table>
            <thead>
                <tr>
                    <th>Candidate Name</th>
                    <th>Vote Count</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($candidatesResult->num_rows > 0): ?>
                    <?php while ($row = $candidatesResult->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['votecount']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="2">No candidates found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        
        <a href="home.php" class="button">Return to Home</a>
    </div>

</body>
</html>
