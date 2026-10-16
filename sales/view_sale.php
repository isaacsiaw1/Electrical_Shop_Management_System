<?php include '../config/auth.php';
 include '../config/database.php';
 include '../includes/header.php'; 
$sale_id = $_GET['sale_id'];
$sql = "SELECT s.*, c.Customer_Name, st.Staff_Name 
        FROM Sale s
        LEFT JOIN Customer c ON s.Customer_ID = c.Customer_ID
        LEFT JOIN Staff st ON s.Staff_ID = st.Staff_ID
        WHERE s.Sale_ID = $sale_id";
$row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Sales</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <br><br>
    <div class="container">
    <h2>View Sale #<?php echo $row['Sale_ID']; ?></h2>
<p><b>Customer:</b> <?php echo $row['Customer_Name']; ?></p>
<p><b>Staff:</b> <?php echo $row['Staff_Name']; ?></p>
<p><b>Date:</b> <?php echo $row['Sale_Date']; ?></p>
    </div>
<br><br>
<div><a href="index.php" class="btn">Back</a></div>
<div><?php include '../includes/footer.php'; ?></div>
</body>
</html>
