<?php
session_start(); // Start the session to access user information

// Check if the user is logged in (you may want to verify their session here)
if (!isset($_SESSION['user_id'])) {
    header("Location: voterLogin.php"); // Redirect to login if not logged in
    exit();
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studentvote1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch candidates from the database
$sql = "SELECT * FROM candidate"; // Assuming candidates are stored in a table named candidate
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vote Page</title>
    <link href="https://fonts.googleapis.com/css?family=Secular+One|Roboto&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #A7C6ED, #E3F2FD);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
            margin: 0;
            padding: 20px;
            overflow: hidden; /* Prevent scrolling */
        }

        h1 {
            font-family: 'Secular One', sans-serif;
            margin-bottom: 20px;
            font-size: 2.5rem;
            text-align: center;
        }

        .candidate-container {
            background-color: rgba(0, 0, 0, 0.6);
            padding: 20px;
            border-radius: 20px;
            max-width: 600px;
            width: 100%;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            text-align: center;
            height: 90vh; /* Make the form container take full height */
            overflow-y: auto; /* Allows scrolling within the container if needed */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            text-align: left;
        }

        th {
            background-color: rgba(0, 0, 0, 0.7);
        }

        tr:hover {
            background-color: rgba(255, 255, 255, 0.1);
            transition: background-color 0.3s ease;
        }

        .vote-button {
            padding: 10px 20px;
            background: linear-gradient(135deg, #A7C6ED, #E3F2FD);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .vote-button:hover {
            background: linear-gradient(135deg, #A7C6ED, #E3F2FD);
        }
    </style>
</head>
<body>

    <h1>Select Your Candidate</h1>
    <div class="candidate-container">
        <form id="voteForm" method="POST">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Student ID</th>
                        <th>Email</th>
                        <th>Vote</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>{$row['name']}</td>";
                            echo "<td>{$row['id']}</td>"; // Assuming 'studentId' is the student's ID
                            echo "<td>{$row['email']}</td>";
                            echo "<td><button type='button' class='vote-button' onclick='vote({$row['id']})'>Vote</button></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No candidates available for voting.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </form>
    </div>

    <script>
        function vote(candidateId) {
            if (confirm("Are you sure you want to vote for this candidate?")) {
                const formData = new FormData();
                formData.append('candidate_id', candidateId);

                fetch('submitVote.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    alert(data.message); // Show success message or handle errors
                    if (data.success) {
                        window.location.href = 'thankYou.php'; // Redirect to a thank you page or another page
                    }
                })
                .catch(error => console.error('Error:', error));
            }
        }
    </script>

</body>
</html>

<?php
$conn->close();
?>
