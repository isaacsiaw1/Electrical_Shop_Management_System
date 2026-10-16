<?php
Include '../config/database.php';
Include '../config/functions.php';
include '../includes/header.php'; 

$id = $_GET['id'];
$sql = "SELECT * FROM `staff` WHERE `Staff_ID` = '$id'";
$row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Staff</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <br><br>

<div class="container">

<h2>Edit Staff</h2>
<form action="update_staff.php" method="POST">
    <input type="hidden" name="Staff_ID" value="<?php echo $row['Staff_ID']; ?>">
    <label>Staff Name:</label><br>
    <input type="text" name="Staff_Name" value="<?php echo $row['Staff_Name']; ?>" required><br><br>
    <label>Phone:</label><br>
    <input type="text" name="Phone" value="<?php echo $row['Phone']; ?>"><br><br>
    <label>Position:</label><br>
    <input type="text" name="Position" value="<?php echo $row['Position']; ?>"><br><br>
    <button type="submit" name="submit">Update</button>
</form>
<?php include '../includes/footer.php'; ?>

</form>

</div>

</body>
</html>
