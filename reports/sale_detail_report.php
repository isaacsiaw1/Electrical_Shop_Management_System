<?php
Include '../config/auth.php';
Include '../config/database.php';
Include '../config/functions.php';

$sql = "SELECT sd.Sale_ID,
               p.Product_Name,
               sd.Quantity,
               sd.Unit_Price,
               sd.Discount
        FROM Sale_Detail sd
        INNER JOIN Product p
        ON sd.Product_ID = p.Product_ID
        ORDER BY sd.Sale_ID";

$result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>

<head>

<title>Sale Details Report</title>

<link rel="stylesheet" href="../css/style.css">

</head>

<body>

<div class="header">

<h1>Electrical Workshop Management System</h1>

<h2>Sale Details Report</h2>

</div>

<div class="container">

<br>

<a href="index.php" class="btn">Back to Reports</a>

<button onclick="window.print()" class="btn">Print Report</button>

<table>

<tr>
<th>Sale ID</th>
<th>Product</th>
<th>Quantity</th>
<th>Unit Price (GH₵)</th>
<th>Discount (GH₵)</th>
</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['Sale_ID']; ?></td>

<td><?php echo $row['Product_Name']; ?></td>

<td><?php echo $row['Quantity']; ?></td>

<td><?php echo number_format($row['Unit_Price'],2); ?></td>

<td><?php echo number_format($row['Discount'],2); ?></td>

</tr>

<?php } ?>

</table>

</div>

</body>

</html>
