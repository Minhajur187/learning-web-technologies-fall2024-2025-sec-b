<?php
session_start();
include("db.php"); 


if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); 
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $current_password = $_POST['current-password'];
    $new_password = $_POST['new-password'];
    $confirm_password = $_POST['confirm-password'];

    
    $user_id = $_SESSION['user_id'];


    if (empty($current_password) || empty($new_password) || empty($confirm_password)) {
        echo "<script>alert('All fields are required');</script>";
        exit;
    }

    if ($new_password !== $confirm_password) {
        echo "<script>alert('New passwords do not match');</script>";
        exit;
    }

    if (strlen($new_password) < 8) {
        echo "<script>alert('Password must be at least 8 characters long');</script>";
        exit;
    }

    $query = "SELECT password FROM form WHERE id = '$user_id' LIMIT 1";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user_data = mysqli_fetch_assoc($result);

        if ($user_data['password'] === $current_password) { 
            $hashed_password = $new_password; 
            $update_query = "UPDATE form SET password = '$hashed_password' WHERE id = '$user_id'";
            if (mysqli_query($con, $update_query)) {
                echo "<script>alert('Password updated successfully');</script>";
            } else {
                echo "<script>alert('Error updating password');</script>";
            }
        } else {
            echo "<script>alert('Current password is incorrect');</script>";
        }
    } else {
        echo "<script>alert('User not found');</script>";
    }
}
?>
