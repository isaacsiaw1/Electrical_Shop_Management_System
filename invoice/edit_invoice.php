<?php
// File: invoice/edit_invoice.php

include '../config/auth.php';
include '../config/database.php';
include '../config/functions.php';
include '../includes/header.php';

$id = $_GET['id'];

$sql = "SELECT * FROM Invoice
        WHERE Invoice_ID='$id'";

$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Invoice</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">

<h2>Edit Invoice</h2>

<form action="update_invoice.php" method="POST">

<input type="hidden"
name="invoice_id"
value="<?php echo $row['Invoice_ID']; ?>">

<label>Total Amount</label>
<input type="number"
step="0.01"
name="total_amount"
value="<?php echo $row['Total_Amount']; ?>">

<label>Invoice Date</label>
<input type="datetime-local"
name="invoice_date"
value="<?php echo date('Y-m-d\TH:i', strtotime($row['Invoice_Date'])); ?>">

<button type="submit">Update</button>

</form>

</div>
<?php include '../includes/footer.php'; ?>
</body>
</html>
