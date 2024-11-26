<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidate Registration</title>
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
            padding: 20px;
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
        }

        @keyframes slideIn {
            from { transform: translateY(-20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        .form-container {
            background-color: rgba(0, 0, 0, 0.8);
            padding: 40px;
            border-radius: 20px;
            max-width: 400px;
            width: 100%;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
            text-align: center;
            animation: fadeIn 0.5s;
            height: auto; /* Auto height to accommodate content */
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .form-field {
            margin-bottom: 15px; /* Reduced margin for closer alignment */
            text-align: left;
        }

        input[type="text"], input[type="email"], input[type="password"], select {
            width: calc(100% - 20px); /* Full width minus padding */
            padding: 10px;
            margin: 5px 0;
            border-radius: 10px;
            border: none;
            font-size: 1rem;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            background-color: #f3f3f3;
            transition: border 0.3s ease;
        }

        /* input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus {
            border: 2px solid #ff6b6b; /* Focus border color */
        /* }  */
        select {
            width: calc(100%); /* Full width minus padding */
            padding: 10px;
            margin: 5px 0;
            border-radius: 10px;
            border: none;
            font-size: 1rem;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            background-color: #f3f3f3;
            transition: border 0.3s ease;
        }

        /* select:focus {
            border: 2px solid #ff6b6b; /* Focus border color for select */
        /* } */

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
            margin-top: 15px; /* Added top margin for separation */
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
    <h1>Candidate Registration</h1>
    <form id="registerForm">
        <div class="form-field">
            <input type="text" name="name" id="name" placeholder="Candidate Name" required>
            <span class="error-message" id="nameError">Name is required.</span>
        </div>

        <div class="form-field">
            <input type="text" name="contact" id="contact" placeholder="Contact Number" required>
            <span class="error-message" id="contactError">Contact number must be exactly 10 digits.</span>
        </div>

        <div class="form-field">
            <input type="email" name="email" id="email" placeholder="Email ID" required>
            <span class="error-message" id="emailError">Please enter a valid email address.</span>
            <span class="error-message" id="emailExistsError">Email is already registered. Please use a different email.</span>
        </div>

        <div class="form-field">
            <select name="dept" id="dept" required>
                <option value="" disabled selected>Select Department</option>
                <option value="Computer Science">Computer Science</option>
                <option value="Information Technology">Information Technology</option>
            </select>
            <span class="error-message" id="departmentError">Please select a department.</span>
        </div>

        <div class="form-field">
            <input type="password" name="password" id="password" placeholder="Password" required>
        </div>

        <input type="submit" value="Register Candidate">
    </form>
</div>

<script>
    document.getElementById('registerForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);

        // Clear previous error messages
        document.querySelectorAll('.error-message').forEach(function(el) {
            el.style.display = 'none';
        });

        // Validate contact number
        const contact = document.getElementById('contact').value;
        if (contact.length !== 10 || isNaN(contact)) {
            document.getElementById('contactError').style.display = 'block';
            return;
        }

        // Validate email format
        const email = document.getElementById('email').value;
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            document.getElementById('emailError').style.display = 'block';
            return;
        }

        // Check if email exists
        fetch('checkCandidateEmail.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.emailExists) {
                document.getElementById('emailExistsError').style.display = 'block';
            } else {
                // Proceed with registration if email is unique
                fetch('candidateRegisterScript.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    alert(data); // Show the server response
                    if (data.includes('successfully')) {
                        window.location.href = 'home.php'; // Redirect to home page
                    }
                })
                .catch(error => console.error('Error:', error));
            }
        })
        .catch(error => console.error('Error:', error));
    });
</script>

</body>
</html>
