<?php
Include '../config/auth.php';
Include '../config/database.php';
Include '../config/functions.php';

$sql = "SELECT * FROM Staff ORDER BY Staff_ID";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Staff Report</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

<div class="header">
    <h1>Electrical Workshop Management System</h1>
    <h2>Staff Report</h2>
</div>

<div class="container">

    <br>

    <a href="index.php" class="btn">Back to Reports</a>

    <button onclick="window.print()" class="btn">
        Print Report
    </button>

    <table>

        <tr>
            <th>Staff ID</th>
            <th>Staff Name</th>
            <th>Phone</th>
            <th>Position</th>
        </tr>

        <?php
        While($row = mysqli_fetch_assoc($result))
        {
        ?>

        <tr>
            <td><?php echo $row['Staff_ID']; ?></td>
            <td><?php echo $row['Staff_Name']; ?></td>
            <td><?php echo $row['Phone']; ?></td>
            <td><?php echo $row['Position']; ?></td>
        </tr>

        <?php
        }
        ?>

    </table>

</div>

</body>
</html>
