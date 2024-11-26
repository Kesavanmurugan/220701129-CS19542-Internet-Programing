<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - iVote Online Voting System</title>
    <link href="https://fonts.googleapis.com/css?family=Secular+One|Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            overflow: hidden; /* Prevent scrolling */
            /* background: linear-gradient(135deg, #A7C6ED, #E3F2FD); Light blue gradient */
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

        .content {
            display: flex;
            align-items: flex-start; /* Align items at the start */
            justify-content: center; /* Center content */
            padding: 20px; /* Padding for the content */
            width: 100%; /* Full width */
            flex-grow: 1; /* Allow content to grow and take space */
            overflow: auto; /* Enable scrolling for content if necessary */
        }

        .image-container {
            flex: 1; /* Allow image container to grow */
            max-width: 400px; /* Set a max width for the image */
            padding: 20px; /* Padding around the image */
        }

        .image-container img {
            width: 100%; /* Full width */
            height: auto; /* Maintain aspect ratio */
            border-radius: 10px; /* Rounded corners */
            max-height: 600px; /* Increased max height for the image */
        }

        .features {
            display: flex;
            flex-wrap: wrap; /* Allow wrapping of boxes */
            justify-content: flex-start; /* Align boxes to the left */
            align-items: flex-start; /* Align boxes at the start */
            width: 60%; /* Adjust width for features */
            padding: 20px; /* Padding for the features section */
        }

        .floating-box {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            margin: 10px; /* Space between boxes */
            animation: float 3s ease-in-out infinite;
            width: calc(45% - 20px); /* Two boxes per row, accounting for margins */
            height: 180px; /* Increased height for boxes */
            transition: transform 0.3s, background-color 0.3s; /* Include background color transition */
            text-align: left; /* Align text to the left */
        }

        .floating-box:hover {
            transform: translateY(-10px); /* Lift effect on hover */
            background-color: rgba(200, 200, 255, 0.8); /* Change color on hover */
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-15px);
            }
        }

        footer {
            background: linear-gradient(135deg, #4d64d6, #2B2D42); /* Dark footer */
            color: white;
            padding: 10px 0; /* Reduced padding for the footer */
            width: 100%;
            text-align: center;
            position: relative; /* Keep footer fixed at the bottom */
        }

        .footer p {
            margin: 0;
            font-size: 0.8rem;
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

    <div class="content">
        <div class="image-container">
            <img src="images/vote_online.avif" alt="About Us Illustration"> <!-- Replace with your image path -->
        </div>
        <div class="features">
            <div class="floating-box">
                <h3>Our Mission</h3>
                <p>To empower students by facilitating fair elections and promoting active participation in the democratic process.</p>
            </div>
            <div class="floating-box">
                <h3>Our Vision</h3>
                <p>To create an inclusive environment where every student's vote counts and contributes to shaping their academic community.</p>
            </div>
            <div class="floating-box">
                <h3>Our Values</h3>
                <p>Transparency, Integrity, and Collaboration are at the core of our values, ensuring that every voting experience is trustworthy and representative.</p>
            </div>
            <div class="floating-box">
                <h3>Community Engagement</h3>
                <p>Encourage participation from all departments for a well-rounded vote.</p>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 iVOTE. All rights reserved.</p>
    </footer>

</body>
</html>
