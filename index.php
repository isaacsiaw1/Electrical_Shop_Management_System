<?php
Include 'config/auth.php';
Include 'config/database.php';
Include 'config/functions.php';

If(!isset($_SESSION['admin']))
{
    Header("Location: authentication/login.php");
    Exit();
}

// Count records
$staff = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM Staff"));
$customers = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM Customer"));
$suppliers = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM Supplier"));
$products = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM Product"));
$sales = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM Sale"));
?>

<!DOCTYPE html>
<html>

<head>

<title>Electrical Workshop Management System</title>

<link rel="stylesheet" href="css/style.css">

</head>

<body>

<div class="header">

<h1>Electrical Workshop Management System</h1>

<h3>Administration Dashboard</h3>

</div>

<div class="container">

<div class="dashboard">

<div class="card">
<h2><?php echo $staff; ?></h2>
<p>Total Staff</p>
<a href="staff/index.php">Manage Staff</a>
</div>

<div class="card">
<h2><?php echo $customers; ?></h2>
<p>Total Customers</p>
<a href="customer/index.php">Manage Customers</a>
</div>

<div class="card">
<h2><?php echo $suppliers; ?></h2>
<p>Total Suppliers</p>
<a href="supplier/index.php">Manage Suppliers</a>
</div>

<div class="card">
<h2><?php echo $products; ?></h2>
<p>Total Products</p>
<a href="product/index.php">Manage Products</a>
</div>

<div class="card">
<h2><?php echo $sales; ?></h2>
<p>Total Sales</p>
<a href="sales/index.php">Manage Sales</a>
</div>

<div class="card">
<h2>Inventory</h2>
<a href="inventory/index.php">Manage Inventory</a>
</div>

<div class="card">
<h2>Invoices</h2>
<a href="invoice/index.php">Manage Invoices</a>
</div>

<div class="card">
<h2>Payments</h2>
<a href="payment/index.php">Manage Payments</a>
</div>

<div class="card">
<h2>Reports</h2>
<a href="reports/index.php">View Reports</a>
</div>

<div class="card">
<h2>Profile</h2>
<a href="profile/index.php">My Profile</a>
</div>

</div>

</div><br>
<div class="card">
<a href="authentication/logout.php">Logout</a>
</div>

</body>

</html>
