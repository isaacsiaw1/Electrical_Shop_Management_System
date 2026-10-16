<?php
// File: customer/edit_customer.php
include '../config/database.php';
include '../includes/header.php'; 

$customer_id = $_GET['customer_id'];
$sql = "SELECT * FROM `Customer` WHERE `Customer_ID` = '$customer_id'";
$row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
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
<h2>Edit Customer</h2>
<form action="update_customer.php" method="POST" class="container">
    <input type="hidden" name="Customer_ID" value="<?php echo $row['Customer_ID']; ?>">

    <label>Customer Name:</label><br>
    <input type="text" name="Customer_Name" value="<?php echo $row['Customer_Name']; ?>" required><br><br>

    <label>Phone:</label><br>
    <input type="text" name="Phone" value="<?php echo $row['Phone']; ?>" required><br><br>

    <label>Address:</label><br>
    <input type="text" name="Address" rows="3" required><?php echo $row['Address']; ?><br><br>

    <button type="submit">Update Customer</button>
    <a href="index.php" class="btn">Back</a>
</form>

<?php include '../includes/footer.php'; ?>
</body>
</html>