<?php
// File: supplier/view_supplier.php

include '../config/auth.php';
include '../config/database.php';
include '../config/functions.php';

$page_title = 'Supplier Records';

include '../includes/header.php';

$sql = "SELECT * FROM Supplier";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Supplier</title>

<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="container">

    <h2>Supplier Records</h2>

    <a href="add_supplier.php" class="btn">Add Supplier</a>

    <table>

        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Registration Date</th>
            <th>Action</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)) : ?>

            <tr>

                <td><?php echo $row['Supplier_ID']; ?></td>

                <td><?php echo $row['Supplier_Name']; ?></td>

                <td><?php echo $row['Phone']; ?></td>

                <td><?php echo $row['Address']; ?></td>

                <td><?php echo $row['Registration_Date']; ?></td>

                <td>

                    <a href="edit_supplier.php?id=<?php echo $row['Supplier_ID']; ?>" class="btn">
                        Edit
                    </a>

                    |

                    <a href="delete_supplier.php?id=<?php echo $row['Supplier_ID']; ?>"
                       onclick="return confirm('Are you sure you want to delete this supplier?');" class="btn">
                        Delete
                    </a>

                </td>

            </tr>

        <?php endwhile; ?>

    </table>
    <br><br>
<div><a href="index.php" class="btn">Back</a></div>
</div>

<?php
include '../includes/footer.php';
?>
</body>
</html>
