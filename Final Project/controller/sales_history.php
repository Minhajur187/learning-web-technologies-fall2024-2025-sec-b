<?php
include('db.php');

$sql = "SELECT * FROM sales_history";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Sale ID: " . $row['id'] . "<br>";
        echo "User ID: " . $row['user_id'] . "<br>";
        echo "Product ID: " . $row['product_id'] . "<br>";
        echo "Quantity: " . $row['quantity'] . "<br>";
        echo "Total Price: " . $row['total_price'] . "<br>";
        echo "Sale Date: " . $row['sale_date'] . "<br><br>";
    }
} else {
    echo "No sales history found.";
}
?>
