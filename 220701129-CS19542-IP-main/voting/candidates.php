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

// Fetch candidates from database
$sql = "SELECT id, name, dept FROM candidate";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidates - iVote Online Voting System</title>
    <link href="https://fonts.googleapis.com/css?family=Secular+One|Roboto&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #A7C6ED, #E3F2FD); /* Light blue gradient */
            color: #333;
            /* overflow: hidden; Prevent scrolling */
        }
        
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: #2F3C7E; /* Dark blue navbar color */
            position: relative;
        }

        .navbar h1 {
            color: white;
            margin: 0;
            font-size: 1.8rem;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background 0.3s ease;
        }

        .navbar a:hover {
            background: rgba(255, 255, 255, 0.2); /* Light hover effect */
        }

        .content {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 0px 20px;
        }

        .content h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .candidates-container {
            display: flex;
            flex-wrap: wrap; /* Allow wrapping of cards */
            justify-content: center; /* Center the candidates */
            padding: 20px;
        }

        .candidate-card {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            padding: 20px;
            width: 250px; /* Fixed width for each card */
            margin: 15px; /* Space between cards */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease;
            text-align: center;
            position: relative;
        }

        .candidate-card:hover {
            transform: translateY(-5px); /* Lift effect on hover */
        }

        .candidate-card img {
            border-radius: 50%; /* Circular image */
            width: 100px; /* Image size */
            height: 100px; /* Image size */
            margin-bottom: 10px; /* Space below image */
        }

        .vote-button, .details-button {
            padding: 8px 15px;
            background: #2F3C7E; /* Darker blue */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.3s ease; /* Added transition for transform */
            margin: 10px; /* Space between buttons */
        }

        .vote-button:hover, .details-button:hover {
            background: #1E2A5D; /* Darker blue on hover */
            transform: scale(1.05); /* Scale effect on hover */
        }

        footer {
            margin-top: 30px;
            background: linear-gradient(135deg, #2F3C7E, #2B2D42);
            color: white;
            padding: 12px;
            text-align: center;
            width: 100%;
            position: relative;
        }

        .footer p {
            margin: 0;
            font-size: 0.8rem;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <h1>iVOTE</h1>
        <div>
            <a href="home.php">Home</a>
            <a href="about.php">About Us</a>
            <a href="contact.php">Contact Us</a>
            <a href="faqs.php">FAQs</a>
            <a href="voterDashboard.php">Log in</a>
            <a href="registerVoter.php">Register</a>
        </div>
    </div>

    <div class="content">
        <h2>Candidates</h2>
        <p>You can only vote for one candidate.</p>

        <div class="candidates-container">
            <?php
            if ($result->num_rows > 0) {
                // Output data of each candidate
                while($row = $result->fetch_assoc()) {
                    echo '<div class="candidate-card">';
                    // echo '<img src="' . $row["image_path"] . '" alt="' . $row["name"] . '">'; // Replace with actual image path
                    echo '<h3>' . $row["name"] . '</h3>';
                    echo '<p>' . $row["dept"] . '</p>';
                    echo '<button class="details-button" onclick="location.href=\'candidateDetails.php?id=' . $row["id"] . '\'">View Details</button>';
                    echo '<button class="vote-button" onclick="location.href=\'voterLogin.php\'">Vote</button>';
                    echo '</div>';
                }
            } else {
                echo '<p>No candidates available.</p>';
            }
            $conn->close(); // Close the database connection
            ?>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 iVOTE. All rights reserved.</p>
    </footer>

</body>
</html>
