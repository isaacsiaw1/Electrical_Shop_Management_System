<?php
// File: customer/save_customer.php
include '../config/database.php';

$Customer_Name = mysqli_real_escape_string($conn, $_POST['Customer_Name']);
$Phone = mysqli_real_escape_string($conn, $_POST['Phone']);
$Address = mysqli_real_escape_string($conn, $_POST['Address']);

$sql = "INSERT INTO `Customer` (`Customer_Name`, `Phone`, `Address`) 
        VALUES ('$Customer_Name', '$Phone', '$Address')";

if(mysqli_query($conn, $sql)){
    header("Location: index.php");
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
