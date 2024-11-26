<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css?family=Secular+One|Roboto&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            /* background: linear-gradient(135deg, #D0E8FF, #A4D3E2); Light blue gradient */
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center; /* Center content vertically */
            min-height: 100vh;
            margin: 0;
            overflow: hidden; /* Prevent scrolling */
        }

        .navbar {
            display: flex;
            align-items: center;
            padding: 20px;
            background-color: #4d64d6; /* Dark blue navbar color */
            justify-content: space-between; /* Space between logo and links */
            width: 100%;
        }

        .navbar h1 {
            color: white;
            margin: 0 10px; /* Margin for spacing */
            font-size: 1.8rem;
        }

        .navbar .links {
            margin-left: auto; /* Push links to the right */
            display: flex; /* Use flexbox for the links */
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

        .dashboard p {
            margin-bottom: 20px;
            font-size: 1.2rem;
            max-width: 600px; /* Limit width for readability */
        }

        .container {
            display: flex;
            justify-content: space-around; /* Space between boxes */
            width: 100%; /* Full width */
            margin: 20px 0; /* Space above and below container */
        }

        .box {
            background-color: rgba(0, 123, 255, 0.6); /* Subtle blue color */
            border-radius: 10px;
            padding: 20px;
            font-size: 1.2rem;
            margin: 10px; /* Margin between boxes */
            cursor: pointer;
            transition: background 0.3s ease, transform 0.3s ease;
            width: 200px; /* Set width for boxes */
            height: 120px; /* Set height for boxes */
            display: flex;
            align-items: center; /* Center text vertically */
            justify-content: center; /* Center text horizontally */
            color: white; /* Text color */
        }

        .box:hover {
            background-color: rgba(0, 123, 255, 0.8); /* Darker blue on hover */
            transform: scale(1.05); /* Scale effect on hover */
        }

        footer {
            margin-top: auto; /* Push footer to the bottom */
            padding: 10px;
            width: 100%;
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
    <div class="links">
        <a href="home.php">Home</a>
        <a href="about.php">About Us</a>
        <a href="contact.php">Contact Us</a>
        <a href="faqs.php">FAQs</a>
        <a href="logout.php">Logout</a>
    </div>
</div>

<div class="dashboard">
    <h2>Admin Dashboard</h2>
    <p>Manage the voting system efficiently. Choose an action below:</p>
    
    <div class="container">
        <div class="box" onclick="location.href='viewVoters.php'">Check Voter Information</div>
        <div class="box" onclick="location.href='viewCandidates.php'">Check Candidate Information</div>
        <div class="box" onclick="location.href='votePercentage.php'">Check Vote Percentage</div>
    </div>
</div>

<footer>
    &copy; 2024 Student Voting System. All Rights Reserved.
</footer>

</body>
</html>
