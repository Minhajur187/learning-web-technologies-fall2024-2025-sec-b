<?php
 include("db.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plant Selling Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('people-working-greenhouse.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        header {
            background-color: rgba(76, 175, 80, 0.8);
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 24px;
        }

        nav {
            display: flex;
            justify-content: center;
            background-color: rgba(51, 51, 51, 0.8);
        }

        nav a {
            color: white;
            padding: 14px 20px;
            text-decoration: none;
            text-align: center;
        }

        nav a:hover {
            background-color: #ddd;
            color: black;
        }

        .container {
            padding: 20px;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.9);
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin: 15px auto;
            width: 80%;
            max-width: 500px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .button {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            margin-top: 10px;
            text-decoration: none;
            border-radius: 5px;
        }

        .button:hover {
            background-color: #45a049;
        }

        footer {
            text-align: center;
            padding: 10px;
            background-color: rgba(51, 51, 51, 0.8);
            color: white;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

        .plant-gallery {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
            padding: 20px;
        }

        .plant-card {
            background-color: rgba(255, 255, 255, 0.9);
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 200px;
            padding: 10px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .plant-card img {
            width: 100%;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <header>
       <h1> Welcome to Our Plants Store</h1>
    </header>

    <nav>
         <a href="AddPlant.php">Plant Management</a>
        <a href="Search.php">Search</a>
       
    </nav>

    <div class="container">
        
       <section id="cart" class="card">
            <h2>My Cart</h2>
            <p>Review the items you want to buy and proceed to checkout.</p>
            <a href="Buys.php" class="button">View Cart</a>
        </section>

        <section id="settings" class="card">
            <h2>Settings</h2>
            <p>Manage your account preferences and customize your experience.</p>
            <a href="updateprofile.html" class="button">Update Settings</a>
        </section>
    </div>

    <footer>
        &copy; 2025 Plant Selling Co. All rights reserved.
    </footer></body>


    <a href="login.php"><h1>LOGOUT</h1></a>
 
</body>
</html>



 