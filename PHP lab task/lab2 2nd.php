<?php
$amount = 500;
$vatpercentage = $amount*0.15;
$vatAmount = $amount * $vatpercentage;
$totalAmount = $amount + $vatAmount;
echo "Original Amount: $" . $amount . "\n";
echo "VAT (15%): $" . $vatAmount . "\n";
echo "Total Amount: $" . $totalAmount . "\n";
?>