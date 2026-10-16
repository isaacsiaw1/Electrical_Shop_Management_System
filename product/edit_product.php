 <?php
// File: product/edit_product.php

include '../config/auth.php';
include '../config/database.php';
include '../config/functions.php';
include '../includes/header.php';

$product_id = $_GET['product_id'];
$sql = "SELECT * FROM `Product` WHERE `Product_ID` = '$product_id'";
$row = mysqli_fetch_assoc(mysqli_query($conn, $sql));

$suppliers = mysqli_query($conn, "SELECT * FROM `Supplier`");
?>

<!DOCTYPE html>
<head>
<title>Edit Product</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="container">   
<h2>Edit Product</h2>
<form action="update_product.php" method="POST">
    <input type="hidden" name="Product_ID" value="<?php echo $row['Product_ID']; ?>">

    <label>Product Name:</label><br>
    <input type="text" name="Product_Name" value="<?php echo $row['Product_Name']; ?>" required><br><br>

    <label>Supplier:</label><br>
    <select name="Supplier_ID" required>
        <?php while($s = mysqli_fetch_assoc($suppliers)){ 
            $selected = ($s['Supplier_ID'] == $row['Supplier_ID']) ? 'selected' : '';
        ?>
        <option value="<?php echo $s['Supplier_ID']; ?>" <?php echo $selected; ?>><?php echo $s['Supplier_Name']; ?></option>
        <?php } ?>
    </select><br><br>

    <label>Unit Price GH₵:</label><br>
    <input type="number" step="0.01" name="Unit_Price" value="<?php echo $row['Unit_Price']; ?>" required><br><br>

    <label>Stock Quantity:</label><br>
    <input type="number" name="Stock_Qty" value="<?php echo $row['Stock_Qty']; ?>" required><br><br>

    <button type="submit" name="submit">Update Product</button>
    <a href="index.php" class="btn">Back</a>
</form>

<?php include '../includes/footer.php'; ?>

</body>
</html>