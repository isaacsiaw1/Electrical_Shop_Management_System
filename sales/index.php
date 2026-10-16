<?php 
include '../config/database.php';
include '../config/functions.php';
include '../includes/header.php';

$sql = "SELECT * FROM Sale ORDER BY Sale_ID DESC";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
     <br><br>
    <h1 class="header">Manage Sales</h1>
<a href="add_sale.php" class="btn">+ Add New Sale</a>

<table border="1" cellpadding="8">
    <tr><th>Sale ID</th><th>Customer</th><th>Staff</th><th>Date</th><th>Action</th></tr>
    <?php while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $row['Sale_ID']; ?></td>
        <td><?php echo getName($conn, 'customer', 'Customer_ID', 'Customer_Name', $row['Customer_ID']); ?></td>
        <td><?php echo getName($conn, 'staff', 'Staff_ID', 'Staff_Name', $row['Staff_ID']); ?></td>
        <td><?php echo formatDate($row['Sale_Date']); ?></td>
        <td>
            <a href="view_sale.php?sale_id=<?php echo $row['Sale_ID']; ?>" class="btn">View</a> |
            <a href="edit_sale.php?sale_id=<?php echo $row['Sale_ID']; ?>" class="btn">Edit</a> |
            <a href="delete_sale.php?id=<?php echo $row['Sale_ID']; ?>" onclick="return confirm('Delete?')" class="btn">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>
<br><br>
<a href="../index.php" class="btn">Back</a><br><br>
<?php include '../includes/footer.php'; ?>

</body>
</html>
