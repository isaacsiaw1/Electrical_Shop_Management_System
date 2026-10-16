<?php
// File: inventory/delete_inventory.php

include '../config/auth.php';
include '../config/database.php';
include '../config/functions.php';
// File: inventory/delete_inventory.php
include '../config/database.php';

If (isset($_GET['id'])) {

    $Inventory_ID = $_GET['id'];

    // Get inventory record
    $result = mysqli_query($conn, "SELECT Product_ID, Quantity
                                   FROM Inventory_book
                                   WHERE Inventory_ID='$Inventory_ID'");

    If (!$result) {
        Die(mysqli_error($conn));
    }

    If ($row = mysqli_fetch_assoc($result)) {

        $Product_ID = $row['Product_ID'];
        $Quantity = $row['Quantity'];

        // Reduce stock
        Mysqli_query($conn, "UPDATE Product
                             SET Stock_Qty = Stock_Qty - $Quantity
                             WHERE Product_ID='$Product_ID'");

        // Delete inventory record
        Mysqli_query($conn, "DELETE FROM Inventory_book
                             WHERE Inventory_ID='$Inventory_ID'");
    }

    Header("Location: index.php");
    Exit();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electrical Workshop Management System</title>

<link rel="stylesheet" href="css/style.css">
</head>
<body>
    
</body>
</html>