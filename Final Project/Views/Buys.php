<?php
include("db.php");

// Retrieve all plants
$plants = mysqli_query($con, "SELECT * FROM plants");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Plants</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }
        h1 {
            text-align: center;
        }
        .cards {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        .card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 250px;
            padding: 20px;
            text-align: center;
        }
        .card h3 {
            margin: 10px 0;
        }
        .card p {
            margin: 5px 0;
        }
        .card form {
            margin-top: 10px;
        }
        .card form input[type="number"] {
            width: 60px;
            padding: 5px;
            margin-right: 5px;
        }
        .card form input[type="submit"] {
            background: #28a745;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
        }
        .card form input[type="submit"]:hover {
            background: #218838;
        }
    </style>
</head>
<body>
    <h1>Plants Card</h1>
    <div class="cards">
        <?php while ($plant = mysqli_fetch_assoc($plants)) { ?>
            <div class="card">
                <h3><?php echo htmlspecialchars($plant['name']); ?></h3>
                <p>Price: $<?php echo number_format($plant['price'], 2); ?></p>
                <form action="addToCart.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $plant['id']; ?>">
                    <input type="hidden" name="name" value="<?php echo htmlspecialchars($plant['name']); ?>">
                    <input type="hidden" name="price" value="<?php echo $plant['price']; ?>">
                    <input type="number" name="quantity" min="1" placeholder="Qty" required>
                    <input type="submit" value="Add to Cart">
                </form>
            </div>
        <?php } ?>
    </div>
</body>
</html>
