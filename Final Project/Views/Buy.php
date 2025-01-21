<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Now</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f3f3f3;
        }

        header {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 24px;
        }

        .container {
            text-align: center;
            padding: 50px;
        }

        .flower-img {
            width: 300px;
            border-radius: 5px;
        }

        .details {
            margin: 20px 0;
        }

        .buy-form {
            margin: 20px 0;
        }

        .buy-form input[type="text"],
        .buy-form input[type="number"] {
            padding: 10px;
            margin: 10px 0;
            width: 300px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .buy-form button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .buy-form button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <header>
        Buy Now
    </header>

    <div class="container">
        <?php
            // Get flower details from query string
            $name = $_GET['name'] ?? 'Unknown Flower';
            $price = $_GET['price'] ?? '0.00';
            $img = $_GET['img'] ?? 'placeholder.jpg';
        ?>

        <!-- Flower Details -->
        <img src="<?php echo $img; ?>" alt="<?php echo $name; ?>" class="flower-img">
        <div class="details">
            <h2><?php echo $name; ?></h2>
            <p>Price: $<?php echo $price; ?></p>
        </div>

        <!-- Payment Form -->
        <form class="buy-form" action="payment.php" method="POST">
            <input type="hidden" name="name" value="<?php echo $name; ?>">
            <input type="hidden" name="price" value="<?php echo $price; ?>">
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" id="quantity" value="1" min="1" required>
            <br>
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" placeholder="Enter your email" required>
            <br>
            <button type="submit">Proceed to Payment</button>
        </form>
    </div>
</body>
</html>
