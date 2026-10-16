<?php
// File: customer/index.php
include '../config/database.php';
include '../includes/header.php';

$sql = "SELECT * FROM `Customer` ORDER BY `Customer_ID` DESC";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<head><link rel="stylesheet" href="../css/style.css"></head>
<body>
     <br><br>
<h1 class="header">Manage Customers</h1>
<a href="add_customer.php" class="btn">+ Add New Customer</a>

<table>
    <tr>
        <th>Customer ID</th>
        <th>Customer Name</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Action</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $row['Customer_ID']; ?></td>
        <td><?php echo $row['Customer_Name']; ?></td>
        <td><?php echo $row['Phone']; ?></td>
        <td><?php echo $row['Address']; ?></td>
        <td>
            <a href="view_customer.php?customer_id=<?php echo $row['Customer_ID']; ?>" class="btn">View</a> |
            <a href="edit_customer.php?customer_id=<?php echo $row['Customer_ID']; ?>" class="btn">Edit</a> | 
            <a href="delete_customer.php?customer_id=<?php echo $row['Customer_ID']; ?>" onclick="return confirm('Delete this customer?')" class="btn">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>
<br><br>
<a href="../index.php" class="btn">Back</a><br><br>
<?php include '../includes/footer.php'; ?>
</body>
</html>