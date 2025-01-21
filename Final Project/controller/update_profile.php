<?php
session_start();
include('db.php');


if (!isset($_SESSION['user_id'])) {
    echo "User is not logged in. <a href='signin.html'>Login</a>";
    exit();
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM profiles WHERE id=$user_id";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error retrieving profile: " . mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $usertype = $_POST['usertype'];

    $update_sql = "UPDATE profiles SET 
                    name='$name', 
                    email='$email', 
                    phone='$phone', 
                    dob='$dob', 
                    gender='$gender', 
                    usertype='$usertype' 
                    WHERE id=$user_id";

    if (mysqli_query($conn, $update_sql)) {
        echo "Profile updated successfully";
    } else {
        echo "Error updating profile: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
