<?php
// File: supplier/add_supplier.php

include '../config/auth.php';
include '../config/database.php';
include '../config/functions.php';
include '../includes/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Supplier</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="container">
    <h2 style="text-align:center;" class="btn">Add New Supplier</h2>
    
    <form action="save_supplier.php" method="POST">
        
        <label>Supplier Name:</label><br>
        <input type="text" name="Supplier_Name" required><br><br>

        <label>Phone:</label><br>
        <input type="text" name="Phone" required><br><br>

        <label>Address:</label><br>
        <input type="text" name="Address"  required><br><br>

        <label>Registration Date:</label><br>
        <input type="date" name="Registration_Date" value="<?php echo date('Y-m-d'); ?>"  required><br><br>

        <!-- THIS IS THE SAVE BUTTON -->
        <button type="submit" name="submit" >
            Save Supplier
        </button>

        <a href="index.php" class="btn">
            Back
        </a>
    </form>
</div>
<?php include '../includes/footer.php'; ?>

</body>
</html>
