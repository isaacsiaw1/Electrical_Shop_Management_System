 <?php
// File: product/view_product.php

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
    <title>Electrical Workshop Management System</title>

<link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php
    $page_title = 'Product Records';

$sql = "SELECT
            p.Product_ID,
            p.Product_Name,
            s.Supplier_Name,
            p.Unit_Price,
            p.Stock_Qty
        FROM Product p
        INNER JOIN Supplier s
            ON p.Supplier_ID = s.Supplier_ID
        ORDER BY p.Product_Name";

$result = mysqli_query($conn, $sql);
?>

<div class="container">

    <h2>Product Records</h2>

    <a href="add_product.php" class="btn">
        Add Product
    </a>

    <table>

        <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Supplier</th>
            <th>Unit Price</th>
            <th>Stock Quantity</th>
            <th>Action</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)) : ?>

            <tr>

                <td><?php echo $row['Product_ID']; ?></td>
                <td><?php echo $row['Product_Name']; ?></td>
                <td><?php echo $row['Supplier_Name']; ?></td>
                <td><?php echo $row['Unit_Price']; ?></td>
                <td><?php echo $row['Stock_Qty']; ?></td>

                <td>

                    <a href="edit_product.php?id=<?php echo $row['Product_ID']; ?>" class="btn">
                        Edit
                    </a>

                    |

                    <a href="delete_product.php?id=<?php echo $row['Product_ID']; ?>"
                       onclick="return confirm('Are you sure you want to delete this product?');" class="btn">
                        Delete
                    </a>

                </td>

            </tr>

        <?php endwhile; ?>

    </table>
    <br><br>
<div><a href="index.php" class="btn">Back</a></div>
</div>

<?php
include '../includes/footer.php';
?>
</body>
</html>