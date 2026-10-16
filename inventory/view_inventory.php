 <?php
// File: inventory/view_inventory.php

include '../config/auth.php';
include '../config/database.php';
include '../config/functions.php';
include '../includes/header.php';

if (!isset($_GET['inventory_id'])) {
    header("Location: index.php");
    exit();
}

$Inventory_ID = $_GET['inventory_id'];

$sql = "SELECT
            Inventory_book.Inventory_ID,
            Product.Product_Name,
            Staff.Staff_Name,
            Inventory_book.Quantity,
            Inventory_book.Transaction_Date
        FROM Inventory_book
        INNER JOIN Product
            ON Inventory_book.Product_ID = Product.Product_ID
        INNER JOIN Staff
            ON Inventory_book.Staff_ID = Staff.Staff_ID
        WHERE Inventory_book.Inventory_ID = '$Inventory_ID'";

$result = mysqli_query($conn, $sql);

if (!$result || mysqli_num_rows($result) == 0) {
    die('Inventory record not found.');
}

$row = mysqli_fetch_assoc($result);
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
    <div class="container">

    <h2>View Inventory Record</h2>

    <table border="1" cellpadding="10" cellspacing="0">

        <tr>
            <th>Inventory ID</th>
            <td><?php echo $row['Inventory_ID']; ?></td>
        </tr>

        <tr>
            <th>Product</th>
            <td><?php echo $row['Product_Name']; ?></td>
        </tr>

        <tr>
            <th>Staff</th>
            <td><?php echo $row['Staff_Name']; ?></td>
        </tr>

        <tr>
            <th>Quantity</th>
            <td><?php echo $row['Quantity']; ?></td>
        </tr>

        <tr>
            <th>Transaction Date</th>
            <td><?php echo $row['Transaction_Date']; ?></td>
        </tr>

    </table>

    <br><br>
<div><a href="index.php" class="btn">Back</a></div>
</div>

<?php include '../includes/footer.php'; ?>

</body>
</html>