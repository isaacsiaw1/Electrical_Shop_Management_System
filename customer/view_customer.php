<?php
// File: customer/view_customer.php

include '../config/auth.php';
include '../config/database.php';
include '../config/functions.php';
include '../includes/header.php';

$sql = "SELECT * FROM Customer";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Records</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">

    <h2>Customer Records</h2>

    <a href="add_customer.php" class="btn">Add Customer</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Action</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>

        <tr>
            <td><?php echo $row['Customer_ID']; ?></td>
            <td><?php echo $row['Customer_Name']; ?></td>
            <td><?php echo $row['Phone']; ?></td>
            <td><?php echo $row['Address']; ?></td>
            <td>
                <a href="edit_customer.php?id=<?php echo $row['Customer_ID']; ?>" class="btn">
                    Edit
                </a>
                |
                <a href="delete_customer.php?id=<?php echo $row['Customer_ID']; ?>"
                   onclick="return confirm('Are you sure you want to delete this customer?');" class="btn">
                    Delete
                </a>
            </td>
        </tr>

        <?php } ?>

    </table>
    <br><br>
    <a href="index.php" class="btn">Back</a>

</div>

<?php include '../includes/footer.php'; ?>

</body>
</html>
