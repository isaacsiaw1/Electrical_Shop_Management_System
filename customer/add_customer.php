<?php
// File: customer/add_customer.php
include '../config/database.php';
include '../includes/header.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
      <link rel="stylesheet" href="../css/style.css">
</head>
<body>
   <div class="container">
    <h2>Add New Customer</h2>
<form action="save_customer.php" method="POST">
    <label>Customer Name:</label><br>
    <input type="text" name="Customer_Name" required><br><br>

    <label>Phone:</label><br>
    <input type="text" name="Phone" required><br><br>

    <label>Address:</label><br>
    <input type="text" name="Address" rows="3" required><br><br>

    <button type="submit">Save Customer</button>
    <a href="index.php" class="btn">Back</a>
</form>

<?php include '../includes/footer.php'; ?>
</body>
</html>

