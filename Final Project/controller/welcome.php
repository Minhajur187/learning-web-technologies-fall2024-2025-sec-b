<?php
session_start();
session_destroy(); 

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            text-align: center;
            background-color: #f9f9f9;
        }
        h1 {
            margin-top: 50px;
            color: #28a745;
        }
        p {
            font-size: 18px;
        }
    </style>
</head>
<body>
    <h1>Payment Successful!</h1>
    <p>Thank you for your purchase. Welcome!</p>
</body>
</html>
