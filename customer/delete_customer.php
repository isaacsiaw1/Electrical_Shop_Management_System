<?php
// File: customer/delete_customer.php
include '../config/database.php';

$customer_id = $_GET['customer_id'];
$sql = "DELETE FROM `Customer` WHERE `Customer_ID` = '$customer_id'";
mysqli_query($conn, $sql);
header("Location: index.php");
exit();
?>