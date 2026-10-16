<?php
// File: payment/payment_report.php

include '../config/auth.php';
include '../config/database.php';
include '../config/functions.php';
include '../includes/header.php';


?>

<!DOCTYPE html>
<html>
<head>
<title>Payment Report</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>
 <br><br>
<div class="container">

    <h1 class="header">Payment Management</h1>

    <a href="add_payment.php" class="btn btn-primary">Add New Payment</a>

    <br><br>

    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <tr>
            <th>Payment ID</th>
            <th>Invoice ID</th>
            <th>Payment Date</th>
            <th>Amount (GH₵)</th>
            <th>Payment Method</th>
            <th>Reference No.</th>
            <th>Actions</th>
        </tr>

        <?php

        $sql = "SELECT * FROM Payment ORDER BY Payment_ID DESC";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_assoc($result)){

        ?>

        <tr>
            <td><?php echo $row['Payment_ID']; ?></td>
            <td><?php echo $row['Invoice_ID']; ?></td>
            <td><?php echo $row['Payment_Date']; ?></td>
            <td><?php echo number_format($row['Amount'],2); ?></td>
            <td><?php echo $row['Payment_Method']; ?></td>
            <td><?php echo $row['Reference_No']; ?></td>

            <td>
                <a href="view_payment.php?payment_id=<?php echo $row['Payment_ID']; ?>" class="btn">View</a> |
                <a href="edit_payment.php?id=<?php echo $row['Payment_ID']; ?>" class="btn">Edit</a> |
                <a href="delete_payment.php?id=<?php echo $row['Payment_ID']; ?>"
                   onclick="return confirm('Are you sure you want to delete this payment?');" class="btn">
                    Delete
                </a>
            </td>
        </tr>

        <?php
            }
        }else{
            echo "<tr><td colspan='7' align='center'>No payments found.</td></tr>";
        }

        ?>

    </table>

</div>
<br><br>
<a href="../index.php" class="btn">Back</a><br><br>
<?php
include '../includes/footer.php';
?>
</body>
</html>
