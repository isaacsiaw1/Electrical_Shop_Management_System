<?php
Include '../config/auth.php';
Include '../config/database.php';
Include '../config/functions.php';

$sql = "SELECT p.Payment_ID,
               p.Invoice_ID,
               p.Payment_Date,
               p.Amount,
               p.Payment_Method,
               p.Reference_No
        FROM Payment p
        ORDER BY p.Payment_ID";

$result=mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>

<head>

<title>Payment Report</title>

<link rel="stylesheet" href="../css/style.css">

</head>

<body>

<div class="header">

<h1>Electrical Workshop Management System</h1>

<h2>Payment Report</h2>

</div>

<div class="container">

<br>

<a href="index.php" class="btn">Back to Reports</a>

<button onclick="window.print()" class="btn">Print Report</button>

<table>

<tr>

<th>Payment ID</th>

<th>Invoice ID</th>

<th>Payment Date</th>

<th>Amount (GH₵)</th>

<th>Payment Method</th>

<th>Reference No.</th>

</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['Payment_ID']; ?></td>

<td><?php echo $row['Invoice_ID']; ?></td>

<td><?php echo $row['Payment_Date']; ?></td>

<td><?php echo number_format($row['Amount'],2); ?></td>

<td><?php echo trim($row['Payment_Method']); ?></td>

<td><?php echo $row['Reference_No']; ?></td>

</tr>

<?php } ?>

</table>

</div>

</body>

</html>

