<?php
    require_once('../models/userModel.php');

    session_start();
    $userID = $_REQUEST['userID'];
    $password = $_REQUEST['password'];

    if($userID == "" || $password == "" ){
    
        echo "null username or password!";
    
    }else{
        $status = login($userID, $password, $userID);
        
        if ($status === "User"){
            $_SESSION['flag'] = 'true';
            header('location: ../view/user_home.php');
        }
        elseif ($status === "Admin") {
            $_SESSION['flag'] = 'true';
            header('location: ../view/admin_home.php');
        }
        else{
            echo "invalid user!";
        }
    }
?>