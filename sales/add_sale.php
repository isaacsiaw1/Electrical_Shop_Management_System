<?php
include '../config/database.php';
include '../includes/header.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Edit Product</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="container">
    <h2>Add New Sale</h2>

    <form action="save_sale.php" method="POST">

        <label>Customer</label><br>
        <select name="Customer_ID" required>
            <option value="">-- Select Customer --</option>

            <?php
            $result = mysqli_query($conn,"SELECT * FROM Customer");

            while($row=mysqli_fetch_assoc($result)){
            ?>
                <option value="<?php echo $row['Customer_ID']; ?>">
                    <?php echo $row['Customer_Name']; ?>
                </option>
            <?php } ?>

        </select>

        <br><br>

        <label>Staff</label><br>
        <select name="Staff_ID" required>
            <option value="">-- Select Staff --</option>

            <?php
            $result=mysqli_query($conn,"SELECT * FROM Staff");

            while($row=mysqli_fetch_assoc($result)){
            ?>
                <option value="<?php echo $row['Staff_ID']; ?>">
                    <?php echo $row['Staff_Name']; ?>
                </option>
            <?php } ?>

        </select>

        <br><br>

        <label>Product</label><br>
        <select name="Product_ID" required>

            <option value="">-- Select Product --</option>

            <?php
            $result=mysqli_query($conn,"SELECT * FROM Product");

            while($row=mysqli_fetch_assoc($result)){
            ?>
                <option value="<?php echo $row['Product_ID']; ?>">
                    <?php
                    echo $row['Product_Name']." (GH₵".$row['Unit_Price'].")";
                    ?>
                </option>
            <?php } ?>

        </select>

        <br><br>

        <label>Quantity</label><br>
        <input type="number" name="Quantity" min="1" required>

        <br><br>

        <label>Discount</label><br>
        <input type="number" name="Discount" value="0" step="0.01">

        <br><br>

        <label>Payment Method:</label>
        <select name="Payment_Method" required>
           <option value="Cash">Cash</option>
           <option value="Card">Card</option>
        </select>

       <br><br>

        <label>Sale Date</label><br>
        <input type="datetime-local"
               name="Sale_Date"
               value="<?php echo date('Y-m-d\TH:i'); ?>"
               required>

        <br><br>

        <input type="submit" name="submit" value="Save Sale">

    </form>

</div>

<?php include '../includes/footer.php'; ?>
