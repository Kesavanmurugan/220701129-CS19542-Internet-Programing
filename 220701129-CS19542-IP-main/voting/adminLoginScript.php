<?php
session_start();

// Hardcoded admin credentials (in production, store in a database)
$admin_username = 'admin';
$admin_password = 'admin123';

$username = $_POST['username'];
$password = $_POST['password'];

// Check admin credentials
if ($username === $admin_username && $password === $admin_password) {
    $_SESSION['is_admin'] = 1;  // Set admin session
    header("Location: adminDashboard.php");
} else {
    echo "Invalid credentials. Please try again.";
}
?>
