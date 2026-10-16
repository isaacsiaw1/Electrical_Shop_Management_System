<?php
Include '../config/auth.php';
Include '../config/database.php';
Include '../config/functions.php';


$sql = "SELECT * FROM Customer ORDER BY Customer_ID";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Customer Report</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

<div class="header">
    <h1>Electrical Workshop Management System</h1>
    <h2>Customer Report</h2>
</div>

<div class="container">

<br>

<a href="index.php" class="btn">Back to Reports</a>

<button onclick="window.print()" class="btn">
Print Report
</button>

<table>

<tr>
<th>Customer ID</th>
<th>Customer Name</th>
<th>Phone</th>
<th>Address</th>
</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>
<td><?php echo $row['Customer_ID']; ?></td>
<td><?php echo $row['Customer_Name']; ?></td>
<td><?php echo $row['Phone']; ?></td>
<td><?php echo $row['Address']; ?></td>
</tr>

<?php } ?>

</table>

</div>

</body>
</html>
