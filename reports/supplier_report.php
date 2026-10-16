<?php
// File: supplier/supplier_report.php

include '../config/auth.php';
include '../config/database.php';
include '../config/functions.php';

$page_title = 'Supplier Report';

include '../includes/header.php';

$sql = "SELECT * FROM Supplier";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier Report</title>

<link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">

    <h2>Supplier Report</h2>

    <table>

        

        <?php while ($row = mysqli_fetch_assoc($result)) : ?>

            <tr>
                <td><?php echo $row['Supplier_ID']; ?></td>
                <td><?php echo $row['Supplier_Name']; ?></td>
                <td><?php echo $row['Phone']; ?></td>
                <td><?php echo $row['Address']; ?></td>
                <td><?php echo $row['Registration_Date']; ?></td>
            </tr>

        <?php endwhile; ?>

    </table>

</div>

<?php
include '../includes/footer.php';
?>

</body>
</html>