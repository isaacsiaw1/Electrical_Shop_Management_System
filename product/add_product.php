<?php
// File: product/add_product.php
include '../config/database.php';
include '../includes/header.php'; 

$suppliers = mysqli_query($conn, "SELECT * FROM `Supplier`");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    
<h2>Add New Product</h2>
<form action="save_product.php" method="POST" class="container">
    <label>Product Name:</label><br>
    <input type="text" name="Product_Name" required><br><br>

    <label>Supplier:</label><br>
    <select name="Supplier_ID" required>
        <option value="">--Select Supplier--</option>
        <?php while($s = mysqli_fetch_assoc($suppliers)){ ?>
        <option value="<?php echo $s['Supplier_ID']; ?>"><?php echo $s['Supplier_Name']; ?></option>
        <?php } ?>
    </select><br><br>

    <label>Unit Price:</label><br>
    <input type="number" step="0.01" name="Unit_Price" required><br><br>

    <label>Stock Quantity:</label><br>
    <input type="number" name="Stock_Qty" required><br><br>

    <button type="submit">Save Product</button>
    <a href="index.php" class="btn">Back</a>
</form>

<?php include '../includes/footer.php'; ?>
</body>
</html>