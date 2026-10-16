<?php
Include '../config/auth.php';
Include '../config/database.php';
Include '../config/functions.php';


$sql = "SELECT i.Invoice_ID,
               i.Sale_ID,
               i.Total_Amount,
               i.Invoice_Date
        FROM Invoice i
        ORDER BY i.Invoice_ID";

$result=mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>

<head>

<title>Invoice Report</title>

<link rel="stylesheet" href="../css/style.css">

</head>

<body>

<div class="header">

<h1>Electrical Workshop Management System</h1>

<h2>Invoice Report</h2>

</div>

<div class="container">

<br>

<a href="index.php" class="btn">Back to Reports</a>

<button onclick="window.print()" class="btn">Print Report</button>

<table>

<tr>

<th>Invoice ID</th>

<th>Sale ID</th>

<th>Total Amount (GH₵)</th>

<th>Invoice Date</th>

</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['Invoice_ID']; ?></td>

<td><?php echo $row['Sale_ID']; ?></td>

<td><?php echo number_format($row['Total_Amount'],2); ?></td>

<td><?php echo $row['Invoice_Date']; ?></td>

</tr>

<?php } ?>

</table>

</div>

</body>

</html>
