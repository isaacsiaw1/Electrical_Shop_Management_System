<?php
// File: invoice/add_invoice.php
include '../config/auth.php';
include '../config/database.php';
include '../config/functions.php';
include '../includes/header.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Invoice</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">

<h2>Add Invoice</h2>

<form action="save_invoice.php" method="POST">

<label>Invoice ID</label>
<input type="number" name="invoice_id" required>

<label>Sale</label>
<select name="sale_id" required>
<option value="">Select Sale</option>

<?php
$result = mysqli_query($conn,"SELECT * FROM Sale");

while($row=mysqli_fetch_assoc($result))
{
?>
<option value="<?php echo $row['Sale_ID']; ?>">
Sale <?php echo $row['Sale_ID']; ?>
</option>
<?php } ?>

</select>

<label>Total Amount</label>
<input type="number" step="0.01" name="total_amount" required>

<label>Invoice Date</label>
<input type="datetime-local" name="invoice_date" required>

<button type="submit">Save</button>

</form>

</div>
<?php

include '../includes/footer.php';
?>
</body>
</html>
