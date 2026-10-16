<?php
Include "../config/auth.php";
Include "../config/database.php";

If(isset($_GET['id'])){
    $Sale_ID = $_GET['id'];

    // 1. Restore stock
    $details = mysqli_query($conn, "SELECT Product_ID, Quantity FROM Sale_Detail WHERE Sale_ID = '$Sale_ID'");
    While($row = mysqli_fetch_assoc($details)){
        $Product_ID = $row['Product_ID'];
        $Quantity = $row['Quantity'];
        Mysqli_query($conn, "UPDATE Product SET Stock_Qty = Stock_Qty + $Quantity WHERE Product_ID = '$Product_ID'");
    }

    // 2. Delete from child tables first – CORRECT ORDER
$q0 = mysqli_query($conn, "DELETE p FROM Payment p 
                           JOIN Invoice I ON p.Invoice_ID = i.Invoice_ID 
                           WHERE i.Sale_ID = '$Sale_ID'") 
      Or die("Payment Delete Error: " . mysqli_error($conn));

$q1 = mysqli_query($conn, "DELETE FROM Invoice WHERE Sale_ID = '$Sale_ID'") 
      Or die("Invoice Delete Error: " . mysqli_error($conn));

$q2 = mysqli_query($conn, "DELETE FROM Sale_Detail WHERE Sale_ID = '$Sale_ID'") 
      Or die("Detail Delete Error: " . mysqli_error($conn));

$q3 = mysqli_query($conn, "DELETE FROM Sale WHERE Sale_ID = '$Sale_ID'") 
      Or die("Sale Delete Error: " . mysqli_error($conn));

// 3. Redirect only if all 4 worked
If($q0 && $q1 && $q2 && $q3){
    Header("location: index.php");
    Exit();
}
}
?>
