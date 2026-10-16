<?php
include '../config/auth.php';
include '../config/database.php';

if(isset($_POST['submit'])){

    $Customer_ID    = mysqli_real_escape_string($conn, $_POST['Customer_ID']);
    $Staff_ID       = mysqli_real_escape_string($conn, $_POST['Staff_ID']);
    $Product_ID     = mysqli_real_escape_string($conn, $_POST['Product_ID']);
    $Quantity       = (int)$_POST['Quantity'];
    $Discount       = (float)$_POST['Discount'];
    $Sale_Date      = date("Y-m-d H:i:s"); // Use current datetime to match DATETIME field
    $Payment_Method = isset($_POST['Payment_Method']) ? mysqli_real_escape_string($conn, $_POST['Payment_Method']) : 'Cash';


    // 1. Get product price and stock
    $product = mysqli_query($conn, "SELECT Unit_Price, Stock_Qty FROM Product WHERE Product_ID = '$Product_ID'") or die(mysqli_error($conn));
    $row = mysqli_fetch_assoc($product);

    if(!$row){ die("Product not found."); }

    $Unit_Price = $row['Unit_Price'];
    $Stock_Qty  = $row['Stock_Qty'];

    // 2. Check stock
    if($Quantity > $Stock_Qty){ die("Not enough stock available. Stock: $Stock_Qty"); }

    // 3. Calculate total for this sale
    $Line_Total = ($Unit_Price * $Quantity) - $Discount;
    if($Line_Total < 0){ $Line_Total = 0; }


    // 4. START TRANSACTION
    mysqli_begin_transaction($conn);

    try {
        // 5. Insert into Sale table
        mysqli_query($conn, "INSERT INTO Sale(Customer_ID, Staff_ID, Sale_Date) VALUES('$Customer_ID', '$Staff_ID', '$Sale_Date')") or throw new Exception(mysqli_error($conn));
        $Sale_ID = mysqli_insert_id($conn);


        // 6. Insert into Sale_Detail
        mysqli_query($conn, "INSERT INTO Sale_Detail(Sale_ID, Product_ID, Quantity, Unit_Price, Discount) VALUES ('$Sale_ID','$Product_ID','$Quantity','$Unit_Price','$Discount')") or throw new Exception(mysqli_error($conn));


        // 7. Update stock
        mysqli_query($conn, "UPDATE Product SET Stock_Qty = Stock_Qty - $Quantity WHERE Product_ID = '$Product_ID'") or throw new Exception(mysqli_error($conn));

        // 7b. Add to inventory_book
        mysqli_query($conn, "INSERT INTO inventory_book(Product_ID, Staff_ID, Quantity, Transaction_Date) VALUES ('$Product_ID', '$Staff_ID', '-$Quantity', '$Sale_Date')") or throw new Exception(mysqli_error($conn));


        // ===== 8. INVOICE MODULE =====
        // NOTE: Your table has NO Invoice_No column. Only Total_Amount
        mysqli_query($conn, "INSERT INTO Invoice(Sale_ID, Total_Amount, Invoice_Date) VALUES ('$Sale_ID', '$Line_Total', '$Sale_Date')") or throw new Exception(mysqli_error($conn));
        $Invoice_ID = mysqli_insert_id($conn);


        // ===== 9. PAYMENT MODULE =====
        // NOTE: Your table column is `Amount` not `Amount_Paid`
        $Reference_No = "PAY" . $Invoice_ID . date("Ymd");
        mysqli_query($conn, "INSERT INTO Payment(Invoice_ID, Payment_Date, Amount, Payment_Method, Reference_No) VALUES ('$Invoice_ID', '$Sale_Date', '$Line_Total', '$Payment_Method', '$Reference_No')") or throw new Exception(mysqli_error($conn));


        // 10. COMMIT
        mysqli_commit($conn);
        header("Location: index.php?msg=Sale+Invoice+Payment+Created+Successfully");
        exit();

    } catch (Exception $e) {
        mysqli_rollback($conn);
        die("Transaction Failed: " . $e->getMessage());
    }

}
?>
<!DOCTYPE html><html><head><title>Save Sales</title></head><body><h2>Error: Invalid Access</h2><a href="index.php">Go Back</a></body></html>
