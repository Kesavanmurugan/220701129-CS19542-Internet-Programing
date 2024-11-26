<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Voting Campaign Management</title>
    <link href="https://fonts.googleapis.com/css?family=Secular+One|Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
        /* General Reset and Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #74ebd5, #ACB6E5);
            color: white;
            text-align: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        h1, h2 {
            font-family: 'Secular One', sans-serif;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }

        h1 {
            font-size: 2rem;
        }

        h2 {
            font-size: 1.5rem;
        }

        .parent {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            max-width: 500px;
            width: 90%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: auto;
        }

        .container {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        a.gradient {
            text-decoration: none;
            font-size: 1.2rem;
            padding: 20px 20px;
            background: linear-gradient(45deg, #ff6b6b, #f94d6a, #ff6b6b);
            color: white;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            border-radius: 10px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            width: 100%;
        }

        a.gradient:hover {
            background: linear-gradient(45deg, #ff9234, #ffcd3c, #ff9234);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);
            transform: scale(1.05);
        }

        a.gradient i {
            margin-right: 10px;
        }

        /* Media Queries for Mobile Responsiveness */
        @media (max-width: 768px) {
            h1 {
                font-size: 1.5rem;
            }
            a.gradient {
                font-size: 1rem;
                padding: 8px 15px;
            }
        }
    </style>
</head>

<body>
    <div class="parent">
        <h1>Student Election System</h1>
        <div class="container">
            <a class="gradient" href="registerVoter.php"><i class="fas fa-user-plus"></i> Voter Registration</a><br>
            <a class="gradient" href="voterLogin.php"><i class="fas fa-sign-in-alt"></i> Voter Login</a><br>
            <a class="gradient" href="registerCandidate.php"><i class="fas fa-user-tie"></i> Candidate Registration</a><br>
            <a class="gradient" href="adminLogin.php"><i class="fas fa-user-shield"></i> Admin Login</a><br>
            <a class="gradient" href="about.php"><i class="fas fa-info-circle"></i> About</a>
        </div>
    </div>
</body>
</html>
