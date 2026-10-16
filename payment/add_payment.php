<?php
// File: payment/add_payment.php

include '../config/auth.php';
include '../config/database.php';
include '../config/functions.php';
include '../includes/header.php';

?>

<!DOCTYPE html>
<html>
<head>
<title>Add Payment</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">

<h2>Add Payment</h2>

<form action="save_payment.php" method="POST">

<label>Payment ID</label>
<input type="number" name="payment_id" required>

<label>Invoice</label>
<select name="invoice_id" required>
<option value="">Select Invoice</option>

<?php
$result = mysqli_query($conn,"SELECT * FROM Invoice");

while($row=mysqli_fetch_assoc($result))
{
?>
<option value="<?php echo $row['Invoice_ID']; ?>">
Invoice <?php echo $row['Invoice_ID']; ?>
</option>
<?php } ?>

</select>

<label>Payment Date</label>
<input type="datetime-local" name="payment_date" required>

<label>Amount</label>
<input type="number" step="0.01" name="amount" required>

<label>Payment Method</label>
<select name="payment_method" required>
<option value="Cash">Cash</option>
<option value="Mobile Money">Mobile Money</option>
<option value="Bank Transfer">Bank Transfer</option>
</select>

<label>Reference Number</label>
<input type="text" name="reference_no" required>

<button type="submit">Save</button>

</form>

</div>
<?php include '../includes/footer.php'; ?>
</body>
</html>
