<?php
Include '../config/auth.php';
Include '../config/database.php';
Include '../config/functions.php';
include '../includes/header.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Staff</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">
    <h2>Staff Records</h2>

    <a href="add_staff.php" class="btn">Add New Staff</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Position</th>
            <th>Action</th>
        </tr>

        <?php
        $sql = "SELECT * FROM Staff";
        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($result))
        {
        ?>

        <tr>
            <td><?php echo $row['Staff_ID']; ?></td>
            <td><?php echo $row['Staff_Name']; ?></td>
            <td><?php echo $row['Phone']; ?></td>
            <td><?php echo $row['Position']; ?></td>

            <td>
                <a href="edit_staff.php?id=<?php echo $row['Staff_ID']; ?>" class="btn">Edit</a>
                |
                <a href="delete_staff.php?id=<?php echo $row['Staff_ID']; ?>" class="btn">Delete</a>
            </td>
        </tr>

        <?php } ?>

    </table>
    <br><br>
<div><a href="index.php" class="btn">Back</a></div>

</div>
<?php include '../includes/footer.php'; ?>
</body>
</html>