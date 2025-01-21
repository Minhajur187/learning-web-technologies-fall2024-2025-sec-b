

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Plants</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            background-color: #f9f9f9;
        }
        h1, h2 {
            text-align: center;
        }
        form {
            max-width: 400px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        form label {
            display: block;
            margin-bottom: 8px;
        }
        form input[type="text"], form input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        form input[type="submit"] {
            background: #28a745;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
        }
        form input[type="submit"]:hover {
            background: #218838;
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
            width: 200px;
            padding: 15px;
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
        .card form input[type="submit"] {
            background: #007bff;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
        }
        .card form input[type="submit"]:hover {
            background: #0056b3;
        }
        .card form .delete-btn {
            background: #dc3545;
        }
        .card form .delete-btn:hover {
            background: #c82333;
        }
    </style>
</head>
<body>
    <h1>My Plants</h1>
    <form method="POST">
        <input type="hidden" name="add_plant" value="1">
        <label for="name">Plant Name</label>
        <input type="text" id="name" name="name" required>

        <label for="price">Price</label>
        <input type="number" id="price" name="price" step="0.01" required>

        <label for="quantity">Quantity</label>
        <input type="number" id="quantity" name="quantity" required>

        <input type="submit" value="Add Plant">
    </form>

    <div class="Plants">
        <h2>Plant List</h2>
        <div class="cards">
            <?php while ($plant = mysqli_fetch_assoc($plants)) { ?>
                <div class="card">
                    <h3><?php echo htmlspecialchars($plant['name']); ?></h3>
                    <p>Price: $<?php echo number_format($plant['price'], 2); ?></p>
                    <p>Quantity: <?php echo $plant['quantity']; ?></p>
                    <form action="UpdatePlant.php" method="GET">
                        <input type="hidden" name="id" value="<?php echo $plant['id']; ?>">
                        <input type="submit" value="Edit">
                    </form>
                    <form method="POST">
                        <input type="hidden" name="id" value="<?php echo $plant['id']; ?>">
                        <input type="hidden" name="delete_plant" value="1">
                        <input type="submit" class="delete-btn" value="Delete">
                    </form>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>
