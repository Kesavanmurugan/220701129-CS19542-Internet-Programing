<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://fonts.googleapis.com/css?family=Secular+One|Roboto&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #A7C6ED, #E3F2FD); /* Light blue gradient */
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            overflow: hidden; /* Prevent scrolling */
        }

        h1 {
            font-family: 'Secular One', sans-serif;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 20px;
            font-size: 2.5rem;
            text-align: center;
            animation: slideIn 0.5s;
            color: #ffcd3c; /* Increased contrast color */
        }

        @keyframes slideIn {
            from { transform: translateY(-20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        .form-container {
            background-color: rgba(0, 0, 0, 0.8);
            padding: 40px;
            border-radius: 15px;
            max-width: 400px;
            width: 100%;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
            text-align: center;
            animation: fadeIn 0.5s;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .form-field {
            margin-bottom: 20px;
            text-align: left;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border-radius: 10px;
            border: none;
            font-size: 1rem;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            background-color: #f3f3f3;
        }

        input[type="text"]:focus, input[type="password"]:focus {
            border: 2px solid #ff6b6b;
        }

        input[type="submit"] {
            padding: 10px 0;
            background: linear-gradient(45deg, #ff6b6b, #f94d6a);
            color: white;
            border: none;
            font-size: 1.2rem;
            font-weight: bold;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
        }

        input[type="submit"]:hover {
            background: linear-gradient(45deg, #ff9234, #ffcd3c);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
            transform: scale(1.05);
        }

        .error-message {
            color: red;
            font-size: 0.85rem;
            margin-top: 5px;
            display: none;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h1>Admin Login</h1>
        <form method="POST" action="adminLoginScript.php">
            <div class="form-field">
                <input type="text" name="username" placeholder="Admin Username" required>
                <span class="error-message" id="usernameError">Please enter a valid username.</span>
            </div>
            <div class="form-field">
                <input type="password" name="password" placeholder="Admin Password" required>
                <span class="error-message" id="passwordError">Please enter your password.</span>
            </div>
            <input type="submit" value="Login">
        </form>
    </div>

</body>
</html>
