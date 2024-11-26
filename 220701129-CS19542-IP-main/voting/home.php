<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iVote Online Voting System</title>
    <link href="https://fonts.googleapis.com/css?family=Secular+One|Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
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

        .hero {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0px 20px; /* Increased padding for more space */
        }

        .hero-text {
            flex: 1;
            margin-left: 100px;
            text-align: left;
            padding-right: 40px; /* More space between text and image */
        }

        .hero h2 {
            font-size: 3rem; /* Increased font size */
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.5rem; /* Increased font size */
            max-width: 800px;
            margin-bottom: 40px;
        }

        .hero-img {
            flex: 1;
            text-align: center;
        }

        .hero-img img {
            max-width: 70%; /* Adjusted width for the image */
            height: auto;
            border-radius: 10px; /* Rounded corners */
            max-height: 400px; /* Reduced max height for consistency */
        }

        .footer {
            margin-top: 50px;
            font-size: 0.8rem; /* Reduced footer size */
            color: white;
            text-align: center;
            background: #4d64d6; /* Dark footer */
            padding: 10px 0; /* Reduced padding for the footer */
        }

        .steps {
            display: flex;
            justify-content: space-around;
            padding: 0px 20px;
            margin-top: 20px;
        }

        .section {
            text-align: center;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            flex: 1; /* Allow sections to grow equally */
            margin: 0 10px; /* Space between sections */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .section:hover {
            transform: translateY(-10px); /* Float effect on hover */
            box-shadow: 0 10px 20px rgba(77, 100, 214, 0.2); /* Increased shadow on hover */
        }

        .section h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .section p {
            font-size: 1rem;
            margin-bottom: 15px;
        }

        .register-button {
            display: inline-block;
            padding: 10px 20px;
            background: #2F3C7E; /* Button color */
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s ease, transform 0.3s ease; /* Added transform for button */
        }

        .register-button:hover {
            background: #1E2A5D; /* Darker blue on hover */
            transform: scale(1.05); /* Scale effect on hover */
        }
    </style>
</head>
<body>

    <div class="navbar">
        <i class="fas fa-vote-yea"></i>
        <h1>iVOTE</h1>
        <div class="links"> <!-- Added a container for the links -->
            <a href="home.php">Home</a>
            <a href="about.php">About Us</a>
            <a href="contact.php">Contact Us</a>
            <a href="faqs.php">FAQs</a>
            <a href="adminAnnouncement.php">Results</a>
            <a href="voterDashboard.php">Log in</a>
            <a href="registerVoter.php">Register</a>
        </div>
    </div>

    <div class="hero">
        <div class="hero-text">
            <h2>Welcome to iVote</h2>
            <p>Let's make voting and elections easy for you. This system is designed to ensure a secured voting session.</p>
            <a href="registerVoter.php" class="register-button">Register as a Voter</a>
        </div>
        <div class="hero-img">
            <img src="images/home.jpg" alt="Voting Illustration"> <!-- Replace with your image path -->
        </div>
    </div>

    <div class="steps">
    <div class="section">
            <h3>Step 1: Sign Up</h3>
            <p>Create an account on this system to vote.</p>
            <a href="registerVoter.php" class="register-button">Register as a Voter</a>
        </div>
        <div class="section">
            <h3>Step 2: Vote</h3>
            <p>Vote for your preferred candidate.</p>
            <a href="registerCandidate.php" class="register-button">Candidate Registration</a>
        </div>
        <div class="section">
            <h3>Step 3: Admin Panel</h3>
            <p>Manage the voting system effectively.</p>
            <a href="adminLogin.php" class="register-button">Admin Login</a>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2024 iVOTE. All rights reserved.</p>
    </div>

</body>
</html>
