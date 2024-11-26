<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voter Login</title>
    <link href="https://fonts.googleapis.com/css?family=Secular+One|Roboto&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #A7C6ED, #E3F2FD);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        h1 {
            font-family: 'Secular One', sans-serif;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 20px;
            font-size: 2.5rem;
            text-align: center;
            animation: slideIn 0.5s;
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

        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border-radius: 10px;
            border: none;
            font-size: 1rem;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            background-color: #f3f3f3;
        }

        input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus {
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
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            background: linear-gradient(45deg, #ff9234, #ffcd3c);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
            transform: scale(1.05);
        }

        .update-password {
            display: block;
            margin-top: 15px;
            font-size: 0.9rem;
            text-align: right;
            color: #fcd34d;
            cursor: pointer;
            text-decoration: none;
        }

        .update-password:hover {
            text-decoration: underline;
            color: #ffcd3c;
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
        <h1>Voter Login</h1>
        <form id="loginForm">
            <div class="form-field">
                <input type="text" name="sid" id="sid" placeholder="Student ID" required>
                <span class="error-message" id="sidError">Student ID or Email does not match any records.</span>
            </div>

            <div class="form-field">
                <input type="email" name="email" id="email" placeholder="Email" required>
                <span class="error-message" id="emailError">Please enter a valid email address.</span>
            </div>

            <div class="form-field">
                <input type="password" name="password" id="password" placeholder="Password" required>
            </div>

            <input type="submit" value="Login">
        </form>

        <a href="updatePassword.php" class="update-password">Update/Forget Password?</a>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);

            fetch('checkVoteStatus.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    if (data.voted) {
                        alert('You have already voted!');
                    } else {
                        window.location.href = 'vote.php'; // Redirect to vote page if the user has not voted
                    }
                } else {
                    document.getElementById('sidError').style.display = 'block';
                }
            })
            .catch(error => console.error('Error:', error));
        });
    </script>

</body>
</html>
