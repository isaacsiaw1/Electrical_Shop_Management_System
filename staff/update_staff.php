<?php
// File: sales/index.php
include '../config/database.php';
include '../config/functions.php';
include '../includes/header.php';

if(isset($_POST['submit'])){
    $Staff_ID = $_POST['Staff_ID'];
    $Staff_Name = $_POST['Staff_Name'];
    $Phone = $_POST['Phone'];
    $Position = $_POST['Position'];

    $sql = "UPDATE `staff` SET 
            `Staff_Name`='$Staff_Name', 
            `Phone`='$Phone', 
            `Position`='$Position' 
            WHERE `Staff_ID`='$Staff_ID'";

    if(mysqli_query($conn, $sql)){
        header('Location: index.php');
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>

<h2>Manage Sales</h2>
<a href="add_sale.php" class="btn-add">+ Add New Sale</a>

<table>
    <tr>
        <th>Sale ID</th>
        <th>Customer</th>
        <th>Staff</th>
        <th>Date</th>
        <th>Action</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $row['Sale_ID']; ?></td>
        <td><?php echo getName($conn, 'Customer', 'Customer_ID', 'Customer_Name', $row['Customer_ID']); ?></td>
        <td><?php echo getName($conn, 'Staff', 'Staff_ID', 'Staff_Name', $row['Staff_ID']); ?></td>
        <td><?php echo formatDate($row['Sale_Date']); ?></td>
        <td>
            <a href="view_sale.php?sale_id=<?php echo $row['Sale_ID']; ?>">View</a> | 
            <a href="edit_sale.php?sale_id=<?php echo $row['Sale_ID']; ?>">Edit</a> | 
            <a href="delete_sale.php?sale_id=<?php echo $row['Sale_ID']; ?>" onclick="return confirm('Delete?')">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>

<?php include '../includes/footer.php'; ?>
