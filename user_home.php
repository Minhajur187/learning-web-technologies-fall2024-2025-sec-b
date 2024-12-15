<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['user_type'] != 'user') {
    header('Location: index.php');
    exit;
}

$user_id = $_SESSION['id'];
$user_name = $_SESSION['name'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Welcome, <?php echo $user_name; ?>!</h2>
    <a href="user_profile.php">Profile</a>
    <a href="change_password.php">Change Password</a>
    <a href="logout.php">Logout</a>
</body>
</html>