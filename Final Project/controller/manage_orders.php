<?php
include('db.php');
session_start();

$sql = "SELECT * FROM orders";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<h2>Order List</h2>";
    echo "<table border='1'>
            <tr>
                <th>Order ID</th>
                <th>User ID</th>
                <th>Plant Name</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Status</th>
            </tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['order_id']}</td>
                <td>{$row['user_id']}</td>
                <td>{$row['plant_name']}</td>
                <td>{$row['quantity']}</td>
                <td>{$row['total_price']}</td>
                <td>{$row['status']}</td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "No orders found.";
}
?>
