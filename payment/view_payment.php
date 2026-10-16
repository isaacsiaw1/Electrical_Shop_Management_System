<?php
// File: payment/view_payment.php

include '../config/auth.php';
include '../config/database.php';
include '../config/functions.php';
include '../includes/header.php';

$sql = "SELECT p.*, c.Customer_Name
        FROM Payment p
        JOIN Invoice i
        ON p.Invoice_ID=i.Invoice_ID
        JOIN Sale s
        ON i.Sale_ID=s.Sale_ID
        JOIN Customer c
        ON s.Customer_ID=c.Customer_ID";

$result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>Payment Records</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">

<h2>Payment Records</h2>

<a href="add_payment.php" class="btn">Add Payment</a>

<table>

<tr>
<th>Payment ID</th>
<th>Customer</th>
<th>Amount</th>
<th>Method</th>
<th>Date</th>
<th>Reference</th>
<th>Action</th>
</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>
<td><?php echo $row['Payment_ID']; ?></td>
<td><?php echo $row['Customer_Name']; ?></td>
<td><?php echo $row['Amount']; ?></td>
<td><?php echo $row['Payment_Method']; ?></td>
<td><?php echo $row['Payment_Date']; ?></td>
<td><?php echo $row['Reference_No']; ?></td>

<td>
<a href="edit_payment.php?id=<?php echo $row['Payment_ID']; ?>" class="btn">Edit</a> |
<a href="delete_payment.php?id=<?php echo $row['Payment_ID']; ?>" class="btn">Delete</a>
</td>

</tr>

<?php } ?>

</table>
   <br><br>
<div><a href="index.php" class="btn">Back</a></div>
</div>
<?php include '../includes/footer.php'; ?>
</body>
</html>
