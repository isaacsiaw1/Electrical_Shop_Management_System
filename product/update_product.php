<?php
include '../config/database.php';

if (isset($_POST['submit'])) {

    $Product_ID = $_POST['Product_ID'];
    $Supplier_ID = $_POST['Supplier_ID'];
    $Product_Name = $_POST['Product_Name'];
    $Unit_Price = $_POST['Unit_Price'];
    $Stock_Qty = $_POST['Stock_Qty'];

    $sql = "UPDATE Product
            SET Product_Name='$Product_Name',
                Supplier_ID='$Supplier_ID',
                Unit_Price='$Unit_Price',
                Stock_Qty='$Stock_Qty'
            WHERE Product_ID='$Product_ID'";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
        exit();
    } else {
        die("Error: " . mysqli_error($conn));
    }
}
?>
