<?php
include '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $Inventory_ID = $_POST['inventory_id'];
    $Product_ID = $_POST['product_id'];
    $Staff_ID = $_POST['staff_id'];
    $New_Quantity = $_POST['quantity'];
    $Transaction_Date = $_POST['transaction_date'];

    // Get the old inventory record
    $old = mysqli_query($conn,
        "SELECT Product_ID, Quantity
         FROM Inventory_book
         WHERE Inventory_ID='$Inventory_ID'");

    $row = mysqli_fetch_assoc($old);

    $Old_Product_ID = $row['Product_ID'];
    $Old_Quantity = $row['Quantity'];

    // Restore old stock
    mysqli_query($conn,
        "UPDATE Product
         SET Stock_Qty = Stock_Qty - $Old_Quantity
         WHERE Product_ID='$Old_Product_ID'");

    // Add new stock
    mysqli_query($conn,
        "UPDATE Product
         SET Stock_Qty = Stock_Qty + $New_Quantity
         WHERE Product_ID='$Product_ID'");

    // Update inventory record
    $sql = "UPDATE Inventory_book
            SET Product_ID='$Product_ID',
                Staff_ID='$Staff_ID',
                Quantity='$New_Quantity',
                Transaction_Date='$Transaction_Date'
            WHERE Inventory_ID='$Inventory_ID'";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
        exit();
    } else {
        die("Error: " . mysqli_error($conn));
    }
}
?>

