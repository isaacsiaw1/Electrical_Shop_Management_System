<?php
Include '../config/auth.php';
Include '../config/database.php';
Include '../config/functions.php';

$sql = "SELECT i.Inventory_ID,
               p.Product_Name,
               s.Staff_Name,
               i.Quantity,
               i.Transaction_Date
        FROM Inventory_book i
        INNER JOIN Product p
        ON i.Product_ID = p.Product_ID
        INNER JOIN Staff s
        ON i.Staff_ID = s.Staff_ID
        ORDER BY i.Inventory_ID";

$result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>

<head>

<title>Inventory Report</title>

<link rel="stylesheet" href="../css/style.css">

</head>

<body>

<div class="header">

<h1>Electrical Workshop Management System</h1>

<h2>Inventory Report</h2>

</div>

<div class="container">

<br>

<a href="index.php" class="btn">Back to Reports</a>

<button onclick="window.print()" class="btn">
Print Report
</button>

<table>

<tr>

<th>Inventory ID</th>
<th>Product</th>
<th>Staff</th>
<th>Quantity</th>
<th>Transaction Date</th>

</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['Inventory_ID']; ?></td>
<td><?php echo $row['Product_Name']; ?></td>
<td><?php echo $row['Staff_Name']; ?></td>
<td><?php echo $row['Quantity']; ?></td>
<td><?php echo $row['Transaction_Date']; ?></td>

</tr>

<?php } ?>

</table>

</div>

</body>

</html>
