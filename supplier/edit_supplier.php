 <?php
// File: supplier/edit_supplier.php

include '../config/auth.php';
include '../config/database.php';
include '../config/functions.php';
include '../includes/header.php';


$id = $_GET['id']; // We will use 'id' everywhere now

$sql = "SELECT * FROM `Supplier` WHERE `Supplier_ID` = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if(!$row){ die("Supplier ID $id not found. <a href='index.php'>Back</a>"); }

$page_title = 'Edit Supplier';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Supplier</title>

<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h2>Edit Supplier</h2>
<form action="update_supplier.php" method="POST" class="container">
    <input type="hidden" name="Supplier_ID" value="<?php echo $row['Supplier_ID']; ?>">
    Supplier Name: <input type="text" name="Supplier_Name" value="<?php echo $row['Supplier_Name']; ?>" required><br><br>
    Phone: <input type="text" name="Phone" value="<?php echo $row['Phone']; ?>" required><br><br>
    Address: <input type="text" name="Address" required><?php echo $row['Address']; ?><br><br>
    Reg Date: <input type="date" name="Registration_Date" value="<?php echo $row['Registration_Date']; ?>" required><br><br>
    <button type="submit">Update</button>
    <a href="index.php" class="btn">Back</a>
</form>
<?php include '../includes/footer.php'; ?>


</body>
</html>