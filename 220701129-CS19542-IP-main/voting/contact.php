<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - iVote Online Voting System</title>
    <link href="https://fonts.googleapis.com/css?family=Secular+One|Roboto&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            /* background: linear-gradient(135deg, #A7C6ED, #E3F2FD); Light blue gradient */
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center; /* Center content horizontally */
            justify-content: flex-start; /* Start content from top */
            min-height: 100vh; /* Full viewport height */
            overflow: hidden; /* Prevent scrolling */
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
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
        .form-container {
            background-color: rgba(0, 0, 0, 0.8);
            padding: 30px; /* Padding for the form */
            border-radius: 15px;
            max-width: 400px; /* Max width for form container */
            width: 100%;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5); /* Box shadow for form */
            animation: fadeIn 0.5s; /* Fade in animation */
            text-align: center; /* Center text inside */
            margin-top: 60px; /* Space from navbar */
            margin-bottom: 40px; /* Space for footer */
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        h2 {
            font-family: 'Secular One', sans-serif;
            color: white;
            margin-bottom: 20px;
            animation: slideIn 0.5s; /* Slide in animation */
            font-size: 1.8rem; /* Font size for heading */
        }

        p {
            color: white; /* Color for paragraph text */
        }

        @keyframes slideIn {
            from { transform: translateY(-20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        input[type="text"], input[type="email"], textarea {
            width: 100%; /* Full width for inputs */
            padding: 8px; /* Padding for inputs */
            margin: 10px 0; /* Margin for inputs */
            border-radius: 8px; /* Rounded corners for inputs */
            border: none; /* No border for inputs */
            font-size: 1rem; /* Font size for inputs */
            color: #2F3C7E; /* Dark text color */
        }

        input[type="text"]:focus, input[type="email"]:focus {
            border: 2px solid #ff6b6b; /* Focus effect */
        }

        input[type="submit"] {
            padding: 8px 15px; /* Padding for submit button */
            background: #2F3C7E; /* Darker blue */
            color: white; /* White text for button */
            font-weight: bold; /* Bold text for button */
            border: none; /* No border for button */
            border-radius: 8px; /* Rounded corners for button */
            cursor: pointer; /* Pointer cursor for button */
            transition: background 0.3s ease; /* Transition for background */
            width: 100%; /* Full width for button */
            margin-top: 10px; /* Margin for button */
        }

        input[type="submit"]:hover {
            background: #4B6E98; /* Lighter blue on hover */
            transform: scale(1.05); /* Scale effect on hover */
        }

        footer {
            margin-top: auto; /* Push footer to bottom */
            background: linear-gradient(135deg, #2F3C7E, #2B2D42); /* Gradient background */
            color: white; /* White text for footer */
            padding: 8px; /* Padding for footer */
            text-align: center; /* Center text in footer */
            width: 100%; /* Full width for footer */
            position: relative; /* Fixed position at the bottom */
            box-shadow: 0 -4px 10px rgba(0, 0, 0, 0.5); /* Box shadow for footer */
        }

        .footer p {
            margin: 0; /* Remove default margin */
            font-size: 0.8rem; /* Reduced font size */
        }
    </style>
</head>
<body>

    <div class="navbar">
    <i class="fas fa-vote-yea"></i>
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

    <div class="form-container">
        <h2>Contact Us</h2>
        <p>If you have any questions, feel free to reach out to us using the form below:</p>
        <form method="POST" action="contactSubmit.php">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <input type="text" name="contact" placeholder="Contact Number" required>
            <textarea name="questions_comments" placeholder="Questions and Comments" rows="4" required></textarea>
            <input type="submit" value="Send Message">
        </form>
    </div>

    <footer>
        <p>&copy; 2024 iVOTE. All rights reserved.</p>
    </footer>

</body>
</html>
