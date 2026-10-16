<?php
// File: customer/update_customer.php
include '../config/database.php';

$Customer_ID = $_POST['Customer_ID'];
$Customer_Name = mysqli_real_escape_string($conn, $_POST['Customer_Name']);
$Phone = mysqli_real_escape_string($conn, $_POST['Phone']);
$Address = mysqli_real_escape_string($conn, $_POST['Address']);

$sql = "UPDATE `Customer` SET 
        `Customer_Name`='$Customer_Name', 
        `Phone`='$Phone', 
        `Address`='$Address' 
        WHERE `Customer_ID`='$Customer_ID'";

if(mysqli_query($conn, $sql)){
    header("Location: index.php");
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
