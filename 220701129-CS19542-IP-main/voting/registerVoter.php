<?php
session_start(); // Start the session

// Database connection
$servername = "localhost"; // Your server name
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "studentvote1";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the total number of registered voters
$totalVotersQuery = "SELECT COUNT(*) as total_voters FROM users";
$totalVotersResult = $conn->query($totalVotersQuery);
$totalVoters = $totalVotersResult->fetch_assoc()['total_voters'];

// Fetch threshold value from settings
$thresholdQuery = "SELECT value FROM settings WHERE name = 'vote_percentage_threshold'";
$thresholdResult = $conn->query($thresholdQuery);
$thresholdValue = $thresholdResult->fetch_assoc()['value']; // This should be in percentage

// Check if the threshold is reached
if ($totalVoters >= $thresholdValue) {
    $_SESSION['message'] = "Registration is closed. The maximum number of voters has been reached.";
    header("Location: registration_status.php");
    exit();
}

// Form handling
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $sid = $_POST['sid'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $department = $_POST['department'];
    $password = $_POST['password'];

    // Check for uniqueness here (email and student ID)
    // Assuming you already have that code implemented

    // If unique, insert into the database
    $stmt = $conn->prepare("INSERT INTO users (name, studentId, email, mobileNumber, department, password) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $name, $sid, $email, $contact, $department, $password);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Voter registered successfully!";
    } else {
        $_SESSION['message'] = "Error registering voter: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    // Redirect to the status page
    header("Location: registration_status.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voter Registration</title>
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
        <h1>Voter Registration</h1>
        <form id="addForm" method="POST">
            <div class="form-field">
                <input type="text" name="name" id="name" placeholder="Name" required>
                <span class="error-message" id="nameError">Name is required.</span>
            </div>

            <div class="form-field">
                <input type="text" name="sid" id="sid" placeholder="Student ID (9 characters)" required>
                <span class="error-message" id="sidError">Student ID must be exactly 9 characters long.</span>
            </div>

            <div class="form-field">
                <input type="email" name="email" id="email" placeholder="Email ID" required>
                <span class="error-message" id="emailError">Please enter a valid email address.</span>
                <span class="error-message" id="emailExistsError">Email is already registered. Please use a different email.</span>
            </div>

            <div class="form-field">
                <input type="text" name="contact" id="contact" placeholder="Contact Number (10 digits)" required>
                <span class="error-message" id="contactError">Contact number must be exactly 10 digits.</span>
            </div>

            <div class="form-field">
                <select name="department" id="department" required>
                    <option value="" disabled selected>Select Department</option>
                    <option value="Computer Science">Computer Science</option>
                    <option value="Information Technology">Information Technology</option>
                </select>
                <span class="error-message" id="departmentError">Please select a department.</span>
            </div>

            <div class="form-field">
                <input type="password" name="password" id="password" placeholder="Password (min 6 characters)" required>
                <span class="error-message" id="passwordError">Password must be at least 6 characters long.</span>
            </div>

            <input type="submit" value="Register Voter">
        </form>
    </div>

    <script>
        document.getElementById('addForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);

            // Clear previous error messages
            document.querySelectorAll('.error-message').forEach(function(el) {
                el.style.display = 'none';
            });

            // Perform validation
            let isValid = true;

            // Validate Name
            const name = document.getElementById('name').value;
            if (!name.trim()) {
                document.getElementById('nameError').style.display = 'block';
                isValid = false;
            }

            // Validate Student ID
            const sid = document.getElementById('sid').value;
            if (sid.length !== 9) {
                document.getElementById('sidError').style.display = 'block';
                isValid = false;
            }

            // Validate Email
            const email = document.getElementById('email').value;
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                document.getElementById('emailError').style.display = 'block';
                isValid = false;
            }

            // Validate Contact Number
            const contact = document.getElementById('contact').value;
            if (contact.length !== 10 || isNaN(contact)) {
                document.getElementById('contactError').style.display = 'block';
                isValid = false;
            }

            // Validate Department Selection
            const department = document.getElementById('department').value;
            if (department === '') {
                document.getElementById('departmentError').style.display = 'block';
                isValid = false;
            }

            // Validate Password
            const password = document.getElementById('password').value;
            if (password.length < 6) {
                document.getElementById('passwordError').style.display = 'block';
                isValid = false;
            }

            // If all validations pass, proceed to check uniqueness in the database
            if (isValid) {
                fetch('checkUnique.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.emailExists) {
                        document.getElementById('emailExistsError').style.display = 'block';
                    } 
                    if (data.sidExists) {
                        document.getElementById('sidError').innerText = 'Student ID is already registered.';
                        document.getElementById('sidError').style.display = 'block';
                    } 
                    if (!data.sidExists && !data.emailExists) {
                        fetch('voterRegisterScript.php', {
                            method: 'POST',
                            body: formData
                        })
                        .then(response => response.text())
                        .then(data => {
                            alert('Voter Registered Successfully');
                            document.getElementById('addForm').reset();
                            window.location.href = 'voterLogin.php'; // Redirect to login page
                        })
                        .catch(error => console.error('Error:', error));
                    }
                })
                .catch(error => console.error('Error:', error));
            }
        });
    </script>

</body>
</html>
