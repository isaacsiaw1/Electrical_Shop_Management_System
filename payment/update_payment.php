<?php
// File: payment/update_payment.php

include '../config/auth.php';
include '../config/database.php';
include '../config/functions.php';
include '../includes/header.php';

$id = $_POST['payment_id'];
$amount = $_POST['amount'];
$method = $_POST['payment_method'];
$reference = $_POST['reference_no'];

$sql = "UPDATE Payment
        SET Amount='$amount',
            Payment_Method='$method',
            Reference_No='$reference'
        WHERE Payment_ID='$id'";

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

