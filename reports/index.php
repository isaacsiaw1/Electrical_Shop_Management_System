<?php
Include '../config/auth.php';
Include '../config/database.php';
Include '../config/functions.php';
include '../includes/header.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Reports Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
     <br><br>

<div class="header">
    <h1>Electrical Workshop Management System</h1>
    <h2>Reports Dashboard</h2>
</div>
 <br><br>
<div class="container">

<div class="dashboard">

<div class="card">
<a href="staff_report.php">Staff Report</a>
</div>

<div class="card">
<a href="customer_report.php">Customer Report</a>
</div>

<div class="card">
<a href="supplier_report.php">Supplier Report</a>
</div>

<div class="card">
<a href="product_report.php">Product Report</a>
</div>

<div class="card">
<a href="inventory_report.php">Inventory Report</a>
</div>

<div class="card">
<a href="sale_report.php">Sales Report</a>
</div>

<div class="card">
<a href="sale_detail_report.php">Sales Details Report</a>
</div>

<div class="card">
<a href="invoice_report.php">Invoice Report</a>
</div>

<div class="card">
<a href="payment_report.php">Payment Report</a>
</div>
</div>
<br><br>
<a href="../index.php" class="btn">Back</a><br><br>
</div>
<?php include '../includes/footer.php'; ?>
</body>
</html>