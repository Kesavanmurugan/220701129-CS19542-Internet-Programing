<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQs - iVote Online Voting System</title>
    <link href="https://fonts.googleapis.com/css?family=Secular+One|Roboto&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            /* background: linear-gradient(135deg, #A7C6ED, #E3F2FD); */
            color: #333;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: #4d64d6; /* Dark blue navbar color */
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
            text-align: center;
            padding: 50px 20px;
        }

        .content h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .faq {
            max-width: 800px;
            margin: 0 auto;
            text-align: left;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
        }

        footer {
            background: #4d64d6;
            color: white;
            padding: 10px;
            text-align: center;
            position: relative;
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
            <a href="adminAnnouncement.php">Results</a>
            <a href="voterDashboard.php">Log in</a>
            <a href="registerVoter.php">Register</a>
        </div>
    </div>

    <div class="content">
        <h2>Frequently Asked Questions</h2>

        <div class="faq">
            <strong>1. How can I be sure that my vote and information are safe on this platform?</strong>
            <p>Your vote and personal information are secured on this platform because the system is built on the highest security protocols and standards.</p>
        </div>

        <div class="faq">
            <strong>2. How long does it take for my vote to be counted?</strong>
            <p>This is an online voting system that speeds up the ballot counting process and counts votes instantly after they are cast in favor of their preferred candidate.</p>
        </div>

        <div class="faq">
            <strong>3. How can I receive election date reminders?</strong>
            <p>The system will provide reminders about upcoming election dates directly to the user. These reminders can be sent via email and dashboard.</p>
        </div>

        <div class="faq">
            <strong>4. Would my vote be kept private and secure?</strong>
            <p>Yes, your vote will be kept secret and secured on the online voting system. The system is designed to protect the integrity of the vote.</p>
        </div>
    </div>

    <footer>
        &copy; 2024 iVOTE. All rights reserved.
    </footer>

</body>
</html>
