<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Voting Campaign Management</title>
    <link href="https://fonts.googleapis.com/css?family=Secular+One|Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
        /* General Styles */
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
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            overflow: hidden;
        }

        .container {
            background-color: rgba(0, 0, 0, 0.6);
            padding: 30px;
            border-radius: 15px;
            max-width: 500px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        a {
            text-decoration: none;
            display: block;
            margin: 10px 0;
            padding: 15px 25px;
            background: linear-gradient(45deg, #ff6b6b, #f94d6a);
            color: white;
            font-weight: bold;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        a:hover {
            background: linear-gradient(45deg, #ff9234, #ffcd3c);
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to the Student Voting System</h1>
        <a href="voterLogin.php"><i class="fas fa-sign-in-alt"></i> Voter Login</a>
        <a href="registerVoter.php"><i class="fas fa-user-plus"></i> Voter Registration</a>
        <a href="registerCandidate.php"><i class="fas fa-user-tie"></i> Candidate Registration</a>
        <a href="adminLogin.php"><i class="fas fa-user-shield"></i> Admin Login</a>
    </div>
</body>
</html>
