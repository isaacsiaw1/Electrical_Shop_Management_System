<?php
// File: product/save_product.php
include '../config/database.php';

$Product_Name = mysqli_real_escape_string($conn, $_POST['Product_Name']);
$Supplier_ID = $_POST['Supplier_ID'];
$Unit_Price = $_POST['Unit_Price'];
$Stock_Qty = $_POST['Stock_Qty'];

$sql = "INSERT INTO `Product` (`Product_Name`, `Supplier_ID`, `Unit_Price`, `Stock_Qty`) 
        VALUES ('$Product_Name', '$Supplier_ID', '$Unit_Price', '$Stock_Qty')";

if(mysqli_query($conn, $sql)){
    header("Location: index.php");
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    
</body>
</html>