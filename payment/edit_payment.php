<?php
// File: payment/edit_payment.php

include '../config/auth.php';
include '../config/database.php';
include '../config/functions.php';
include '../includes/header.php';

$id = $_GET['id'];

$sql = "SELECT * FROM Payment
        WHERE Payment_ID='$id'";

$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Payment</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">

<h2>Edit Payment</h2>

<form action="update_payment.php" method="POST">

<input type="hidden"
name="payment_id"
value="<?php echo $row['Payment_ID']; ?>">

<label>Amount</label>
<input type="number"
step="0.01"
name="amount"
value="<?php echo $row['Amount']; ?>">

<label>Payment Method</label>
<select name="payment_method">
<option value="Cash">Cash</option>
<option value="Mobile Money">Mobile Money</option>
<option value="Bank Transfer">Bank Transfer</option>
</select>

<label>Reference Number</label>
<input type="text"
name="reference_no"
value="<?php echo $row['Reference_No']; ?>">

<button type="submit">Update</button>

</form>

</div>
<?php include '../includes/footer.php'; ?>
</body>
</html>
