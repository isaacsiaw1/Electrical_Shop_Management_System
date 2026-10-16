<?php
// File: invoice/view_invoice.php

include '../config/auth.php';
include '../config/database.php';
include '../config/functions.php';
include '../includes/header.php';

$sql = "SELECT i.*, c.Customer_Name
        FROM Invoice i
        JOIN Sale s
        ON i.Sale_ID=s.Sale_ID
        JOIN Customer c
        ON s.Customer_ID=c.Customer_ID";

$result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>Invoice Records</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">

<h2>Invoice Records</h2>

<a href="add_invoice.php" class="btn">Add Invoice</a>

<table>

<tr>
<th>Invoice ID</th>
<th>Sale ID</th>
<th>Customer</th>
<th>Total Amount</th>
<th>Invoice Date</th>
<th>Action</th>
</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>
<td><?php echo $row['Invoice_ID']; ?></td>
<td><?php echo $row['Sale_ID']; ?></td>
<td><?php echo $row['Customer_Name']; ?></td>
<td><?php echo $row['Total_Amount']; ?></td>
<td><?php echo $row['Invoice_Date']; ?></td>
<td>
<a href="edit_invoice.php?id=<?php echo $row['Invoice_ID']; ?>" class="btn">Edit</a> |
<a href="delete_invoice.php?id=<?php echo $row['Invoice_ID']; ?>" class="btn">Delete</a>
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
