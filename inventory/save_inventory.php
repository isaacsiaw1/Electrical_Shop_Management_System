<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $Product_ID = $_POST['product_id'];
    $Staff_ID = $_POST['staff_id'];
    $Quantity = $_POST['quantity'];
    $Transaction_Date = $_POST['transaction_date'];

    $sql = "INSERT INTO Inventory_book
            (Product_ID, Staff_ID, Quantity, Transaction_Date)
            VALUES
            ('$Product_ID', '$Staff_ID', '$Quantity', '$Transaction_Date')";

    if (mysqli_query($conn, $sql)) {

        mysqli_query($conn,
            "UPDATE Product
             SET Stock_Qty = Stock_Qty + $Quantity
             WHERE Product_ID = '$Product_ID'");

        header("Location: index.php");
        exit();

    } else {
        die("SQL Error: " . mysqli_error($conn));
    }
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