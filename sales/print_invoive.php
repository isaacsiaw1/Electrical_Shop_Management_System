
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include '../config/database.php';

$sale_id = isset($_GET['sale_id']) ? (int)$_GET['sale_id'] : 0;
if($sale_id == 0){ 
    die('Error: Invalid Sale ID'); 
}

// 1. Check if sale exists
$sql_check = "SELECT `Sale_ID` FROM `sale` WHERE `Sale_ID` = " . $sale_id;
$check = $conn->query($sql_check);
if($check->num_rows == 0){ 
    die('Error: Sale ID ' . $sale_id . ' not found'); 
}

// 2. Get Sale + Customer + Staff
$sql1 = "SELECT s.`Sale_ID`, s.`Sale_Date`, c.`Customer_Name`, c.`Phone`, c.`Address`, st.`Staff_Name` ";
$sql1 .= "FROM `sale` s ";
$sql1 .= "JOIN `customer` c ON s.`Customer_ID` = c.`Customer_ID` ";
$sql1 .= "JOIN `staff` st ON s.`Staff_ID` = st.`Staff_ID` ";
$sql1 .= "WHERE s.`Sale_ID` = " . $sale_id;
$result1 = $conn->query($sql1);
$sale = $result1->fetch_assoc();

// 3. Get Invoice + Payment
$sql2 = "SELECT i.`Invoice_ID`, i.`Invoice_Date`, i.`Total_Amount`, p.`Payment_Method`, p.`Amount` as `Paid_Amount`, p.`Reference_No` ";
$sql2 .= "FROM `invoice` i LEFT JOIN `payment` p ON i.`Invoice_ID` = p.`Invoice_ID` ";
$sql2 .= "WHERE i.`Sale_ID` = " . $sale_id;
$result2 = $conn->query($sql2);
$inv_pay = $result2->fetch_assoc();

// 4. Get All Products
$sql3 = "SELECT d.`Quantity`, d.`Unit_Price`, d.`Discount`, p.`Product_Name` ";
$sql3 .= "FROM `sale_detail` d JOIN `product` p ON d.`Product_ID` = p.`Product_ID` "; // NOTE: sale_detail no space
$sql3 .= "WHERE d.`Sale_ID` = " . $sale_id;
$details = $conn->query($sql3);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Invoice - <?php echo $sale_id; ?></title>
<style>
    body{font-family:Arial; font-size:14px; margin:0;}
    .invoice-box{max-width:800px; margin:20px auto; padding:30px; border:1px solid #eee;}
    .header{text-align:center; border-bottom:2px solid #333; padding-bottom:10px;}
    .info{display:flex; justify-content:space-between; margin:20px 0;}
    table{width:100%; border-collapse:collapse;}
    table, th, td{border:1px solid #000;}
    th, td{padding:8px;}
    .text-right{text-align:right;}
    .no-print{text-align:right; margin-bottom:15px;}
    @media print {.no-print{display:none;} .invoice-box{border:none;}}
</style>
</head>
<body>
<div class="invoice-box">
    <div class="no-print">
        <button onclick="window.print()">Print</button>
        <a href="add_sale.php"><button>New Sale</button></a>
    </div>

    <div class="header">
        <h2>ELECTRICAL SHOP</h2>
        <h3>SALES INVOICE</h3>
    </div>

    <div class="info">
        <div>
            <b>Bill To:</b><br>
            <?php echo htmlspecialchars($sale['Customer_Name']); ?><br>
            <?php echo htmlspecialchars($sale['Phone']); ?><br>
            <?php echo htmlspecialchars($sale['Address']); ?>
        </div>
        <div class="text-right">
            <b>Invoice No:</b> INV-<?php echo $inv_pay['Invoice_ID']; ?><br>
            <b>Sale No:</b> <?php echo $sale['Sale_ID']; ?><br>
            <b>Date:</b> <?php echo date('d-M-Y H:i', strtotime($sale['Sale_Date'])); ?><br>
            <b>Served By:</b> <?php echo htmlspecialchars($sale['Staff_Name']); ?>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>#</th><th>Product</th><th>Qty</th><th>Unit Price</th><th>Discount</th><th class="text-right">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $i = 1; 
            $gt = 0; 
            while($row = $details->fetch_assoc()){ 
                $line = ($row['Unit_Price'] * $row['Quantity']) - $row['Discount']; 
                $gt = $gt + $line; 
                echo '<tr>';
                echo '<td>' . $i . '</td>';
                echo '<td>' . htmlspecialchars($row['Product_Name']) . '</td>';
                echo '<td>' . $row['Quantity'] . '</td>';
                echo '<td>GHS ' . number_format($row['Unit_Price'], 2) . '</td>';
                echo '<td>GHS ' . number_format($row['Discount'], 2) . '</td>';
                echo '<td class="text-right">GHS ' . number_format($line, 2) . '</td>';
                echo '</tr>';
                $i++;
            } 
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" class="text-right"><b>GRAND TOTAL</b></td>
                <td class="text-right"><b>GHS <?php echo number_format($gt,2); ?></b></td>
            </tr>
        </tfoot>
    </table>
</div>
</body>
</html>
