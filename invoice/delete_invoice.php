<?php
// File: invoice/delete_invoice.php

include '../config/auth.php';
include '../config/database.php';
include '../config/functions.php';
include '../includes/header.php';

$id = $_GET['id'];

$sql = "DELETE FROM Invoice
        WHERE Invoice_ID='$id'";

if(mysqli_query($conn,$sql))
{
    header("Location:view_invoice.php");
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
   <?php include '../includes/footer.php'; ?> 
</body>
</html>