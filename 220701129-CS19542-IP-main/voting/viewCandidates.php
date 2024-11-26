<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidate Information</title>
    <link href="https://fonts.googleapis.com/css?family=Secular+One|Roboto&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #A7C6ED, #E3F2FD);
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }

        h1 {
            font-family: 'Secular One', sans-serif;
            margin-bottom: 20px;
            font-size: 2.5rem;
            animation: fadeIn 0.5s;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            animation: slideIn 0.5s;
        }

        @keyframes slideIn {
            from { transform: translateY(-20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        th, td {
            padding: 10px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            text-align: left;
            transition: background 0.3s ease;
        }

        th {
            background-color: rgba(0, 0, 0, 0.7);
        }

        td {
            background-color: rgba(0, 0, 0, 0.5);
        }

        td:hover {
            background-color: rgba(255, 107, 107, 0.3); /* Highlight on hover */
        }

        .back-button {
            padding: 10px 20px;
            background: linear-gradient(45deg, #ff6b6b, #f94d6a);
            color: white;
            border: none;
            font-size: 1.1rem;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 20px;
        }

        .back-button:hover {
            background: linear-gradient(45deg, #ff9234, #ffcd3c);
            transform: scale(1.05);
        }

        .delete-button {
            padding: 5px 10px;
            background: #ff6b6b;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .delete-button:hover {
            background: #ff9234;
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }
            .back-button {
                width: 100%;
            }
        }
    </style>
</head>
<body>

    <h1>Candidate Information</h1>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Vote Count</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Database connection
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "studentvote1";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch candidate data
            $sql = "SELECT * FROM candidate"; // Ensure this table name is correct
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['name']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['contact']}</td>
                            <td>{$row['voteCount']}</td>
                            <td>
                                <button class='delete-button' onclick='deleteCandidate({$row['id']})'>Delete</button>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No candidates found</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>

    <button class="back-button" onclick="location.href='adminDashboard.php'">Back to Admin Dashboard</button>

    <script>
        // Function to delete candidate
        function deleteCandidate(id) {
            if (confirm("Are you sure you want to delete this candidate?")) {
                fetch('delete_candidate.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `id=${id}`
                })
                .then(response => response.text())
                .then(data => {
                    console.log(data);
                    const row = document.querySelector(`tr:has(button[onclick="deleteCandidate(${id})"])`);
                    if (row) {
                        row.remove();
                    }
                })
                .catch(error => console.error('Error:', error));
            }
        }
    </script>

</body>
</html>
