<?php
include('db.php');
session_start();


if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'User') {
    header('Location: signin.html');
    exit();
}

$user_id = $_SESSION['user_id']; 


$sql = "SELECT cart.plant_id, plants.name, cart.quantity, plants.price
        FROM cart
        JOIN plants ON cart.plant_id = plants.id
        WHERE cart.user_id = $user_id";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error fetching cart items: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) > 0) {
    $total_price = 0;

    
    mysqli_begin_transaction($conn);

    try {
        
        while ($item = mysqli_fetch_assoc($result)) {
            $plant_id = $item['plant_id'];
            $quantity = $item['quantity'];
            $price = $item['price'];
            $total = $price * $quantity;

            $total_price += $total;

            
            $order_sql = "INSERT INTO orders (user_id, plant_name, quantity, total_price, order_date)
                          VALUES ($user_id, '{$item['name']}', $quantity, $total, NOW())";
            if (!mysqli_query($conn, $order_sql)) {
                throw new Exception("Error inserting order: " . mysqli_error($conn));
            }
        }

        
        $delete_sql = "DELETE FROM cart WHERE user_id = $user_id";
        if (!mysqli_query($conn, $delete_sql)) {
            throw new Exception("Error clearing cart: " . mysqli_error($conn));
        }

        
        mysqli_commit($conn);

    
        echo "Order confirmed successfully! <a href='order_history.php'>View Order History</a>";
    } catch (Exception $e) {
    
        mysqli_rollback($conn);
        echo "Error confirming order: " . $e->getMessage();
    }
} else {
    echo "Your cart is empty. <a href='view_plants.php'>Continue Shopping</a>";
}
?>
