<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];


    $_SESSION['cart'][] = [
        'id' => $id,
        'name' => $name,
        'price' => $price,
        'quantity' => $quantity,
        'total' => $price * $quantity
    ];
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background: #f4f4f4;
        }
        tr:nth-child(even) {
            background: #f9f9f9;
        }
        tr:hover {
            background: #f1f1f1;
        }
        .total {
            text-align: right;
            margin: 20px auto;
            width: 80%;
        }
        .total h3 {
            margin: 0;
        }
        .payment {
            display: block;
            text-align: center;
            margin: 20px auto;
        }
        .payment button {
            background: #28a745;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .payment button:hover {
            background: #218838;
        }
    </style>
</head>
<body>
    <h1>Your Cart</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $grandTotal = 0;
            foreach ($_SESSION['cart'] as $item) {
                $grandTotal += $item['total'];
                echo "<tr>
                    <td>{$item['name']}</td>
                    <td>$" . number_format($item['price'], 2) . "</td>
                    <td>{$item['quantity']}</td>
                    <td>$" . number_format($item['total'], 2) . "</td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
    <div class="total">
        <h3>Grand Total: $<?php echo number_format($grandTotal, 2); ?></h3>
    </div>
    <div class="payment">
        <form action="welcome.php" method="POST">
            <button type="submit">Proceed to Payment</button>
        </form>
    </div>
</body>
</html>
