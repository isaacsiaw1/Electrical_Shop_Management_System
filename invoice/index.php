 
<?php
// File: invoice/index.php
include '../config/database.php';
include '../config/functions.php';
include '../includes/header.php';

$sql = "SELECT * FROM `Invoice` ORDER BY `Invoice_ID` DESC";
$result = mysqli_query($conn, $sql);
?>



<head>   
<title>Electrical Workshop Management System</title>

<link rel="stylesheet" href="../css/style.css">
</head>
<body>
     <br><br>
    <h1 class="header">Manage Invoices</h1>
<a href="add_invoice.php" class="btn">+ Add New Invoice</a>

<table>
    <tr>
        <th>Invoice ID</th>
        <th>Sale ID</th>
        <th>Customer</th>
        <th>Total Amount</th>
        <th>Invoice Date</th>
        <th>Action</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)) { 
        $sale_id = $row['Sale_ID'];
        $sale = mysqli_fetch_assoc(mysqli_query($conn, "SELECT Customer_ID FROM Sale WHERE Sale_ID='$sale_id'"));
    ?>
    <tr>
        <td><?php echo $row['Invoice_ID']; ?></td>
        <td><?php echo $row['Sale_ID']; ?></td>
        <td><?php echo getName($conn, 'Customer', 'Customer_ID', 'Customer_Name', $sale['Customer_ID']); ?></td>
        <td>GH₵ <?php echo number_format($row['Total_Amount'], 2); ?></td>
        <td><?php echo formatDate($row['Invoice_Date']); ?></td>
        <td>
            <a href="view_invoice.php?invoice_id=<?php echo $row['Invoice_ID']; ?>" class="btn">View</a> | 
            <a href="edit_invoice.php?id=<?php echo $row['Invoice_ID']; ?>" class="btn">Edit</a> |
            <a href="delete_invoice.php?invoice_id=<?php echo $row['Invoice_ID']; ?>" onclick="return confirm('Delete this invoice?')" class="btn">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>
<br><br>
<a href="../index.php" class="btn">Back</a><br><br>
<?php include '../includes/footer.php'; ?>

</body>
</html>