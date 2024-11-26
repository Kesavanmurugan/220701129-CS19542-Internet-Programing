<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update/Forget Password</title>
    <link href="https://fonts.googleapis.com/css?family=Secular+One|Roboto&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #74ebd5, #ACB6E5);
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
            font-size: 2.2rem;
        }

        .form-container {
            background-color: rgba(0, 0, 0, 0.6);
            padding: 40px;
            border-radius: 20px;
            max-width: 400px;
            width: 100%;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        .form-container h1 {
            margin-bottom: 30px;
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
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            transform: scale(1.05);
        }

    </style>
</head>
<body>

    <div class="form-container">
        <h1>Update/Forget Password</h1>
        <form id="updateForm">
            <div class="form-field">
                <input type="text" name="sid" id="sid" placeholder="Student ID" required>
            </div>

            <div class="form-field">
                <input type="password" name="new_password" id="new_password" placeholder="New Password" required>
            </div>

            <input type="submit" value="Update Password">
        </form>
    </div>

    <script>
        document.getElementById('updateForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);

            fetch('updatePasswordScript.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                alert('Password Updated Successfully');
                window.location.href = 'voterLogin.php'; // Redirect to login page
            })
            .catch(error => console.error('Error:', error));
        });
    </script>

</body>
</html>
