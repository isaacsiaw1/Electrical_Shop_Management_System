 <?php
// File: inventory/add_inventory.php

include '../config/auth.php';
include '../config/database.php';
include '../config/functions.php';
include '../includes/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electrical Workshop Management System</title>

<link rel="stylesheet" href="../css/style.css">
</head>
<body>
   <?php
$page_title = 'Add Inventory';
$products = mysqli_query($conn, "SELECT * FROM Product ORDER BY Product_Name");
?>

<div class="container">

    <h2>Add Inventory</h2>

    <form action="save_inventory.php" method="POST">

        <label>Product</label><br>
        <select name="product_id" required>
            <option value="">-- Select Product --</option>

            <?php
            $product = mysqli_query($conn, "SELECT * FROM Product");

            while($row = mysqli_fetch_assoc($product)){
            ?>
                <option value="<?php echo $row['Product_ID']; ?>">
                    <?php echo $row['Product_Name']; ?>
                </option>
            <?php } ?>
        </select>

        <br><br>

        <label>Staff</label><br>
        <select name="staff_id" required>
            <option value="">-- Select Staff --</option>

            <?php
            $staff = mysqli_query($conn, "SELECT * FROM Staff");

            while($row = mysqli_fetch_assoc($staff)){
            ?>
                <option value="<?php echo $row['Staff_ID']; ?>">
                    <?php echo $row['Staff_Name']; ?>
                </option>
            <?php } ?>
        </select>

        <br><br>

        <label>Quantity</label><br>
        <input type="number" name="quantity" min="1" required>

        <br><br>

        <label>Transaction Date</label><br>
        <input type="date" name="transaction_date"
               value="<?php echo date('Y-m-d'); ?>" required>

        <br><br>

        <button type="submit" name="submit">
            Save Inventory
        </button>

    </form>

</div>

<?php
include '../includes/footer.php';
?>


</body>
</html>