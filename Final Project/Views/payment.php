<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $email = $_POST['email'];

    $total = $price * $quantity;

    echo "<h1>Payment Details</h1>";
    echo "<p>Thank you, $email, for purchasing $quantity x $name.</p>";
    echo "<p>Total Amount: $$total</p>";
}
?>
