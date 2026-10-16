<?php
// File: supplier/index.php
include '../config/database.php';
include '../includes/header.php';
include '../config/functions.php';

$sql = "SELECT * FROM `Supplier` ORDER BY `Supplier_ID` DESC";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
     <br><br>
   
<h1 class="header">Supplier List</h1>
<a href="add_supplier.php" class="btn">+ Add New Supplier</a>
<table border="1" cellpadding="10">
    <tr>
        <th>ID</th><th>Name</th><th>Phone</th><th>Action</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $row['Supplier_ID']; ?></td>
        <td><?php echo $row['Supplier_Name']; ?></td>
        <td><?php echo $row['Phone']; ?></td>
        <td>
            <a href="view_supplier.php?supplier_id=<?php echo $row['Supplier_ID']; ?>" class="btn">View</a> 
            <a href="edit_supplier.php?id=<?php echo $row['Supplier_ID']; ?>" class="btn">Edit</a> | 
            <a href="delete_supplier.php?id=<?php echo $row['Supplier_ID']; ?>" onclick="return confirm('Delete?')" class="btn">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>
<br><br>
<a href="../index.php" class="btn">Back</a><br><br>
<?php include '../includes/footer.php'; ?>
</body>
</html>