<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $login_id = $_POST['login_id'];
    $login_password = $_POST['login_password'];

    $users = file("users.txt");

    $valid_login = false;
    foreach ($users as $user) {
        list($id, $password) = explode("|", $user);
        if ($login_id === $id && $login_password === $password) {
            $valid_login = true;
            break;
        }
    }

    if ($valid_login) {
        echo "Login successful!";
    
    } else {
        echo "Invalid login credentials.";
    }
}
?>