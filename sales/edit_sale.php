<?php include '../config/auth.php'; 
include '../config/database.php'; 
$sale_id = $_GET['sale_id'];
$sql = "SELECT * FROM Sale WHERE Sale_ID = $sale_id";
$row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Sale</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    
<h2>Edit Sale #<?php echo $sale_id; ?></h2>
<form action="update_sale.php" method="POST">
    <input type="hidden" name="Sale_ID" value="<?php echo $row['Sale_ID']; ?>">
    
    <label>Sale Date:</label>
    <input type="datetime-local" name="Sale_Date" value="<?php echo date('Y-m-d\TH:i', strtotime($row['Sale_Date'])); ?>" required><br><br>

    <button type="submit">Update Sale</button>
    <a href="index.php" class="btn">Back</a>
</form>


</body>
</html>