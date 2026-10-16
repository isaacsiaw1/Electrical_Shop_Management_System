<?php
// File: inventory/edit_inventory.php
include '../config/database.php';
include '../config/functions.php';
include '../includes/header.php'; 
include '../config/auth.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$Inventory_ID = $_GET['id'];

$sql = "SELECT * FROM Inventory_book WHERE Inventory_ID='$Inventory_ID'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    die("Inventory record not found.");
}

$row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electrical Workshop Management System</title>

<link rel="stylesheet" href="../css/style.css">
</head>
<body>
  
<div class="container">

    <h2>Edit Inventory</h2>

    <form action="update_inventory.php" method="POST">

        <input type="hidden" name="inventory_id"
               value="<?php echo $row['Inventory_ID']; ?>">

        <label>Product</label><br>

        <select name="product_id" required>

            <?php

            $products = mysqli_query($conn,
                "SELECT * FROM Product");

            while($product = mysqli_fetch_assoc($products)){

                $selected = ($product['Product_ID'] == $row['Product_ID']) ? "selected" : "";

                echo "<option value='".$product['Product_ID']."' $selected>"
                    .$product['Product_Name'].
                    "</option>";
            }

            ?>

        </select>

        <br><br>

        <label>Staff</label><br>

        <select name="staff_id" required>

            <?php

            $staff = mysqli_query($conn,
                "SELECT * FROM Staff");

            while($member = mysqli_fetch_assoc($staff)){

                $selected = ($member['Staff_ID'] == $row['Staff_ID']) ? "selected" : "";

                echo "<option value='".$member['Staff_ID']."' $selected>"
                    .$member['Staff_Name'].
                    "</option>";
            }

            ?>

        </select>

        <br><br>

        <label>Quantity</label><br>

        <input type="number"
               name="quantity"
               value="<?php echo $row['Quantity']; ?>"
               min="1"
               required>

        <br><br>

        <label>Transaction Date</label><br>

        <input type="date"
               name="transaction_date"
               value="<?php echo date('Y-m-d', strtotime($row['Transaction_Date'])); ?>"
               required>

        <br><br>

        <button type="submit">
            Update Inventory
        </button>

    </form>

</div>

<?php
include '../includes/footer.php';
?>


</body>
</html>