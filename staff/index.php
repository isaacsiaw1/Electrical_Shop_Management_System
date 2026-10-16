<?php
// File: staff/index.php
include '../config/database.php';
include '../config/functions.php';
include '../includes/header.php';

$sql = "SELECT * FROM `Staff` ORDER BY `Staff_ID` DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <br><br>
    <h1 style="text-align: center;" class="header">Manage Staff</h1>
<a href="add_staff.php" class="btn">+ Add New Staff</a>

<table>
    <tr>
        <th>Staff ID</th>
        <th>Staff Name</th>
        <th>Phone</th>
        <th>Position</th>
        <th>Action</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $row['Staff_ID']; ?></td>
        <td><?php echo $row['Staff_Name']; ?></td>
        <td><?php echo $row['Phone']; ?></td>
        <td><?php echo $row['Position']; ?></td>
        <td>
            <a href="view_staff.php?staff_id=<?php echo $row['Staff_ID']; ?>" class="btn">View</a> |
            <a href="edit_staff.php?id=<?php echo $row['Staff_ID']; ?>" class="btn">Edit</a> | 
            <a href="delete_staff.php?id=<?php echo $row['Staff_ID']; ?>" onclick="return confirm('Delete this staff?')" class="btn">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>
<br><br>
<a href="../index.php" class="btn">Back</a><br><br>
<?php include '../includes/footer.php'; ?>

</body>
</html>