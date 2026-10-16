<?php
// File: supplier/update_supplier.php

include '../config/auth.php';
include '../config/database.php';
include '../config/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id      = $_POST['supplier_id'];
    $name    = $_POST['supplier_name'];
    $phone   = $_POST['phone'];
    $address = $_POST['address'];
    $date    = $_POST['registration_date'];

    $sql = "UPDATE Supplier
            SET Supplier_Name = '$Supplier_Name',
                Phone = '$Phone',
                Address = '$Address',
                Registration_Date = '$date'
            WHERE Supplier_ID = '$Supplier_id'";

    if (mysqli_query($conn, $sql)) {

        header('Location: view_supplier.php');
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
    <title>Update Supplier</title>

<link rel="stylesheet" href="../css/style.css">
</head>
<body>
    
</body>
</html>

