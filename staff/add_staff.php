 <?php
include '../config/database.php';
include '../includes/header.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="../css/style.css">
</head>
<body>
   
<div class="container">
    <h2>Add New Staff</h2>
    <form action="save_staff.php" method="POST">
        <label>Staff Name:</label><br>
        <input type="text" name="Staff_Name" style="width:100%; padding:8px;" required><br><br>

        <label>Phone:</label><br>
        <input type="text" name="Phone" style="width:100%; padding:8px;"><br><br>

        <label>Position:</label><br>
        <input type="text" name="Position" ><br><br>

        <button type="submit" name="submit">Save Staff</button>
        <a href="index.php" class="btn">Back</a>
    </form>
</div>
<?php include '../includes/footer.php'; ?>

</body>
</html>
