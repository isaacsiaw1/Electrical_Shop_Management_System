<?php
Include '../config/auth.php';
Include '../config/database.php';
Include '../config/functions.php';

$sql = "SELECT p.Product_ID,
               p.Product_Name,
               s.Supplier_Name,
               p.Unit_Price,
               p.Stock_Qty
        FROM Product p
        INNER JOIN Supplier s
        ON p.Supplier_ID = s.Supplier_ID
        ORDER BY p.Product_ID";

$result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Product Report</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

<div class="header">
    <h1>Electrical Workshop Management System</h1>
    <h2>Product Report</h2>
</div>

<div class="container">

<br>

<a href="index.php" class="btn">Back to Reports</a>

<button onclick="window.print()" class="btn">
Print Report
</button>

<table>

<tr>
<th>Product ID</th>
<th>Product Name</th>
<th>Supplier</th>
<th>Unit Price (GH₵)</th>
<th>Stock Quantity</th>
</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['Product_ID']; ?></td>
<td><?php echo $row['Product_Name']; ?></td>
<td><?php echo $row['Supplier_Name']; ?></td>
<td><?php echo number_format($row['Unit_Price'],2); ?></td>
<td><?php echo $row['Stock_Qty']; ?></td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>
