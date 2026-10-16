<?php
// File: supplier/delete_supplier.php

include '../config/auth.php';
include '../config/database.php';
include '../config/functions.php';

$id = $_GET['id'];

// STEP 1: Check if this supplier has products
$check_sql = "SELECT COUNT(*) as total FROM `product` WHERE `Supplier_ID` = '$id'";
$check_result = mysqli_query($conn, $check_sql);
$row = mysqli_fetch_assoc($check_result);

if($row['total'] > 0){
    // Supplier has products, can't delete
    echo "<h3>Cannot Delete</h3>";
    echo "<p>This supplier has ".$row['total']." product(s) linked to it.</p>";
    echo "<p>Please delete the products first before deleting this supplier.</p>";
    echo "<a href='index.php'>Go Back</a>";
} else {
    // Safe to delete
    $sql = "DELETE FROM `Supplier` WHERE `Supplier_ID` = '$id'";
    if (mysqli_query($conn, $sql)) {
        header('Location: index.php');
        exit();
    } else {
        die('Error: ' . mysqli_error($conn));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Supplier</title>

<link rel="stylesheet" href="../css/style.css">

</head>
<body>
    
</body>
</html>
