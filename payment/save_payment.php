<?php
// File: payment/save_payment.php

include '../config/auth.php';
include '../config/database.php';
include '../config/functions.php';
include '../includes/header.php';

$id = $_POST['payment_id'];
$invoice = $_POST['invoice_id'];
$date = $_POST['payment_date'];
$amount = $_POST['amount'];
$method = $_POST['payment_method'];
$reference = $_POST['reference_no'];

$sql = "INSERT INTO Payment
(Payment_ID, Invoice_ID, Payment_Date,
Amount, Payment_Method, Reference_No)
VALUES
('$id','$invoice','$date',
'$amount','$method','$reference')";

if(mysqli_query($conn,$sql))
{
    header("Location:view_payment.php");
}
else
{
    echo mysqli_error($conn);
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