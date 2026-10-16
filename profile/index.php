<?php
include '../config/auth.php';
include '../config/database.php';
include '../config/functions.php';

$sql = "SELECT * FROM Staff WHERE Staff_ID = 1";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>

<head>

<title>Administrator Profile</title>

<link rel="stylesheet" href="../css/style.css">

</head>

<body>
    
    <nav>
<br>
<ul class="container">

<li><a href="/electrical_workshop/index.php">Home</a></li>

<li><a href="/electrical_workshop/supplier/view_supplier.php">Suppliers</a></li>

<li><a href="/electrical_workshop/customer/view_customer.php">Customers</a></li>

<li><a href="/electrical_workshop/staff/view_staff.php">Staff</a></li>

<li><a href="/electrical_workshop/product/view_product.php">Products</a></li>

<li><a href="/electrical_workshop/inventory/view_inventory.php">Inventory</a></li>

<li><a href="/electrical_workshop/invoice/view_invoice.php">Invoices</a></li>

<li><a href="/electrical_workshop/payment/view_payment.php">Payments</a></li>

<li><a href="/electrical_workshop/reports/index.php">Reports</a></li>

</ul>

</nav>
     <br><br>

<div class="header">

<h1>Electrical Workshop Management System</h1>

<h2>Administrator Profile</h2>

</div>
 <br><br>
<div class="container">

<br>

<a href="../index.php" class="btn">Back to Dashboard</a>

<table>

<tr>
<th>Field</th>
<th>Information</th>
</tr>

<tr>
<td>Staff ID</td>
<td><?php echo $row['Staff_ID']; ?></td>
</tr>

<tr>
<td>Full Name</td>
<td><?php echo $row['Staff_Name']; ?></td>
</tr>

<tr>
<td>Phone Number</td>
<td><?php echo $row['Phone']; ?></td>
</tr>

<tr>
<td>Position</td>
<td><?php echo $row['Position']; ?></td>
</tr>

</table>

<br>

<h2>System Information</h2>

<table>

<tr>
<th>Item</th>
<th>Value</th>
</tr>

<tr>
<td>Application</td>
<td>Electrical Workshop Management System</td>
</tr>

<tr>
<td>Version</td>
<td>Version 1.0</td>
</tr>

<tr>
<td>Database</td>
<td>MySQL</td>
</tr>

<tr>
<td>Server</td>
<td>XAMPP Apache</td>
</tr>

<tr>
<td>Programming Language</td>
<td>PHP</td>
</tr>

</table>
<br><br>
<a href="../index.php" class="btn">Back</a><br><br>
</div><br><br>
<?php
include '../includes/footer.php';
?>
</body>
</html>
