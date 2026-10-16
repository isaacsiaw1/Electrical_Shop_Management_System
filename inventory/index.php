 
  <?php
 
// File: inventory/index.php
include '../config/database.php';
include '../config/functions.php';
include '../includes/header.php';

?>
<head>   
<title>Electrical Workshop Management System</title>

<link rel="stylesheet" href="../css/style.css">
</head>
<body>
 
 <br><br>
<div class="container">

    <h1 class="header">Inventory Management</h1>

    <a href="add_inventory.php" class="btn">Add New Inventory</a>

    <br><br>

    <table >
        <tr>
            <th>Inventory ID</th>
            <th>Product</th>
            <th>Staff</th>
            <th>Quantity</th>
            <th>Transaction Date</th>
            <th>Actions</th>
        </tr>

        <?php

        $sql = "SELECT Inventory_book.Inventory_ID,
                       Product.Product_Name,
                       Staff.Staff_Name,
                       Inventory_book.Quantity,
                       Inventory_book.Transaction_Date
                FROM Inventory_book
                INNER JOIN Product
                    ON Inventory_book.Product_ID = Product.Product_ID
                INNER JOIN Staff
                    ON Inventory_book.Staff_ID = Staff.Staff_ID
                ORDER BY Inventory_book.Inventory_ID DESC";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_assoc($result)){
        ?>

        <tr>
            <td><?php echo $row['Inventory_ID']; ?></td>
            <td><?php echo $row['Product_Name']; ?></td>
            <td><?php echo $row['Staff_Name']; ?></td>
            <td><?php echo $row['Quantity']; ?></td>
            <td><?php echo $row['Transaction_Date']; ?></td>

            <td>
                <a href="view_inventory.php?inventory_id=<?php echo $row['Inventory_ID']; ?>" class="btn">View</a> |
                <a href="edit_inventory.php?id=<?php echo $row['Inventory_ID']; ?>"class="btn">Edit</a> |
                <a href="delete_inventory.php?id=<?php echo $row['Inventory_ID']; ?>"
                   onclick="return confirm('Are you sure you want to delete this inventory record?');"class="btn">
                    Delete
                </a>
            </td>
        </tr>

        <?php
            }
        } else {
            echo "<tr><td colspan='6' align='center'>No inventory records found.</td></tr>";
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