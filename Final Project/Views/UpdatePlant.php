

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Plant</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            background-color: #f9f9f9;
        }
        h1 {
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
            background: #007bff;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
        }
        form input[type="submit"]:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Update Plant</h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $plant['id']; ?>">
        <label for="name">Plant Name</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($plant['name']); ?>" required>

        <label for="price">Price</label>
        <input type="number" id="price" name="price" step="0.01" value="<?php echo $plant['price']; ?>" required>

        <label for="quantity">Quantity</label>
        <input type="number" id="quantity" name="quantity" value="<?php echo $plant['quantity']; ?>" required>

        <input type="submit" value="Update Plant">
    </form>
</body>
</html>
