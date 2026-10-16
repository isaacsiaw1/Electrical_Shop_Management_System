<?php include '../config/auth.php'; include '../config/database.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <h2>Sales Report</h2>
<?php
$total = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(total_amount) as total FROM Sale"))['total'];
$count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as cnt FROM Sale"))['cnt'];
?>  
<p>Total Sales: <?php echo $count; ?></p>
<p>Total Revenue: GHS <?php echo $total; ?></p>
<a href="index.php">Back</a>

</body>
</html>