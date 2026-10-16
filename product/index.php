<?php
// File: product/index.php
include '../config/database.php';
include '../config/functions.php';
include '../includes/header.php';

$sql = "SELECT * FROM `Product` ORDER BY `Product_ID` DESC";
$result = mysqli_query($conn, $sql);
?>
<link rel="stylesheet" href="../css/style.css">
<body>
     <br><br>
<h1 class="header">Manage Products</h1>
<a href="add_product.php" class="btn">+ Add New Product</a>

<table>
    <tr>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Supplier</th>
        <th>Unit Price</th>
        <th>Stock Qty</th>
        <th>Action</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $row['Product_ID']; ?></td>
        <td><?php echo $row['Product_Name']; ?></td>
        <td><?php echo getName($conn, 'Supplier', 'Supplier_ID', 'Supplier_Name', $row['Supplier_ID']); ?></td>
        <td>GH₵ <?php echo number_format($row['Unit_Price'], 2); ?></td>
        <td><?php echo $row['Stock_Qty']; ?></td>
        <td>
            <a href="view_product.php?product_id=<?php echo $row['Product_ID']; ?>" class="btn">View</a> | 
            <a href="edit_product.php?product_id=<?php echo $row['Product_ID']; ?>" class="btn">Edit</a> | 
            <a href="delete_product.php?product_id=<?php echo $row['Product_ID']; ?>" onclick="return confirm('Delete this product?')" class="btn">Delete</a>
        </td>
    </tr>
    <?php } ?>
    
</table>
<br><br>
<a href="../index.php" class="btn">Back</a><br><br>
</body>
<?php include '../includes/footer.php'; ?>

<?php
