<?php
Include '../config/auth.php';
Include '../config/database.php';
Include '../config/functions.php';

$sql = "SELECT sa.Sale_ID,
               c.Customer_Name,
               st.Staff_Name,
               sa.Sale_Date
        FROM Sale sa
        INNER JOIN Customer c
        ON sa.Customer_ID = c.Customer_ID
        INNER JOIN Staff st
        ON sa.Staff_ID = st.Staff_ID
        ORDER BY sa.Sale_ID";

$result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>

<head>

<title>Sales Report</title>

<link rel="stylesheet" href="../css/style.css">

</head>

<body>

<div class="header">

<h1>Electrical Workshop Management System</h1>

<h2>Sales Report</h2>

</div>

<div class="container">

<br>

<a href="index.php" class="btn">Back to Reports</a>

<button onclick="window.print()" class="btn">
Print Report
</button>

<table>

<tr>

<th>Sale ID</th>
<th>Customer</th>
<th>Staff</th>
<th>Sale Date</th>

</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['Sale_ID']; ?></td>
<td><?php echo $row['Customer_Name']; ?></td>
<td><?php echo $row['Staff_Name']; ?></td>
<td><?php echo $row['Sale_Date']; ?></td>

</tr>

<?php } ?>

</table>

</div>

</body>

</html>
