<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voter Dashboard</title>
    <link href="https://fonts.googleapis.com/css?family=Secular+One|Roboto&display=swap" rel="stylesheet">

    <?php
    session_start(); // Start the session

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "studentvote1";

    // Function to get total voters
    function getTotalVoters($conn) {
        $query = "SELECT COUNT(*) AS total_voters FROM users"; // Adjust the table name if necessary
        $result = $conn->query($query);
        return $result->fetch_assoc()['total_voters'];
    }

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get total voters
    $totalVoters = getTotalVoters($conn);

    // Get total voters who have voted
    $totalVotersWhoVotedQuery = "SELECT COUNT(*) AS total_voted FROM users WHERE voted = 1"; // Only count voters who have voted
    $totalVotersWhoVotedResult = $conn->query($totalVotersWhoVotedQuery);
    $totalVoted = $totalVotersWhoVotedResult->fetch_assoc()['total_voted'];

    // Calculate remaining voters
    $totalLeftToVote = $totalVoters - $totalVoted;

    // Close the database connection
    $conn->close();
    ?>

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            /* background: linear-gradient(135deg, #D0E8FF, #A4D3E2); Light blue gradient */
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            overflow: hidden;
        }

        .navbar {
            display: flex;
            align-items: center;
            padding: 20px;
            background-color: #4d64d6; /* Dark blue navbar color */
            justify-content: space-between; /* Space between logo and links */
        }

        .navbar h1 {
            color: white;
            margin: 0 10px; /* Margin for spacing */
            font-size: 1.8rem;
        }

        .navbar .links {
            margin-left: auto; /* Push links to the right */
            display: flex; /* Use flexbox for the links */
            align-items: center; /* Center items vertically */
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background 0.3s ease;
            margin-left: 10px; /* Space between links */
        }

        .navbar a:hover {
            background: rgba(255, 255, 255, 0.2); /* Light hover effect */
        }

        .navbar i {
            color: white;
            font-size: 1.8rem; /* Icon size */
            margin-right: 10px; /* Space between icon and text */
        }

        .dashboard {
            display: flex;
            flex-direction: column;
            align-items: center; /* Center dashboard content */
            justify-content: center;
            text-align: center; /* Center text */
            width: 80%; /* Adjust width for better alignment */
            padding: 20px; /* Add padding for better spacing */
            margin: 0 auto; /* Center the dashboard */
        }

        .dashboard h2 {
            margin-bottom: 20px;
            font-size: 2rem;
            animation: fadeIn 1s; /* Fade in animation */
        }

        .container {
            display: flex;
            justify-content: center; /* Center the container */
            margin-top: 20px; /* Space above container */
            width: 100%; /* Full width */
        }

        .box {
            background-color: rgba(0, 0, 0, 0.6);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 20px;
            font-size: 1.2rem;
            margin: 10px; /* Margin between boxes */
            cursor: pointer;
            transition: background 0.3s ease, transform 0.3s ease;
            width: 200px; /* Set width for boxes */
            height: 100px; /* Set height for boxes */
            display: flex;
            align-items: center; /* Center text vertically */
            justify-content: center; /* Center text horizontally */
        }

        .box:hover {
            background-color: rgba(255, 107, 107, 0.8);
            transform: scale(1.05); /* Scale effect on hover */
        }

        .info-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            max-width: 400px;
            margin: 20px auto; /* Center with margin */
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            animation: fadeIn 1s; /* Fade in animation */
        }

        .info {
            margin: 15px 0;
            font-size: 1.2rem;
        }

        footer {
            margin-top: auto; /* Push footer to the bottom */
            padding: 10px;
            text-align: center;
            font-size: 0.9rem;
            background-color: #4d64d6; /* Dark footer color */
            color: white;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
</head>
<body>

<div class="navbar">
    <i class="fas fa-vote-yea"></i>
    <h1>iVOTE</h1>
    <nav class="links">
        <a href="home.php">Home</a>
        <a href="about.php">About Us</a>
        <a href="contact.php">Contact Us</a>
        <a href="faqs.php">FAQs</a>
        <a href="logout.php">Logout</a>
    </nav>
</div>

<div class="dashboard">
    <h2>Welcome to the Voter Dashboard</h2>
    <p>Please choose an option below:</p>
    <div class="container">
        <div class="box" onclick="location.href='voterLogin.php'">Login as Voter</div>
        <div class="box" onclick="location.href='registerVoter.php'">Register as Voter</div>
    </div>
</div>

<div class="info-container">
    <div class="info">Total Voters: <?php echo $totalVoters; ?></div>
    <div class="info">Voters Who Have Voted: <?php echo $totalVoted; ?></div>
    <div class="info">Voters Left to Vote: <?php echo $totalLeftToVote; ?></div>
</div>

<footer>
    &copy; 2024 Student Voting System. All Rights Reserved.
</footer>

</body>
</html>
