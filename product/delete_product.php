<?php
include '../config/database.php';

if (isset($_GET['product_id'])) {

    $Product_ID = $_GET['product_id'];

    // Check if the product exists
    $check = mysqli_query($conn,
        "SELECT * FROM Product
         WHERE Product_ID='$Product_ID'");

    if (mysqli_num_rows($check) > 0) {

        $delete = mysqli_query($conn,
            "DELETE FROM Product
             WHERE Product_ID='$Product_ID'");

        if ($delete) {
            header("Location: index.php");
            exit();
        } else {
            die("Error: " . mysqli_error($conn));
        }

    } else {
        die("Product not found.");
    }

} else {
    header("Location: index.php");
    exit();
}
?>
