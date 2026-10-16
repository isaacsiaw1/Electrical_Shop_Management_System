<?php
include '../config/database.php';

if(isset($_POST['submit'])){

    $Supplier_Name = $_POST['Supplier_Name'];
    $Phone = $_POST['Phone'];
    $Address = $_POST['Address'];
    $Registration_Date = $_POST['Registration_Date'];

    // USE BACKTICKS ` ` NOT SINGLE QUOTES ' '
    $sql = "INSERT INTO `Supplier` (`Supplier_Name`, `Phone`, `Address`, `Registration_Date`) 
            VALUES ('$Supplier_Name', '$Phone', '$Address', '$Registration_Date')";

    if(mysqli_query($conn, $sql)){
        header('Location: index.php');
        exit();
    } else {
         Echo "Please submit the form from add_supplier.php";
    Echo "<br><a href='add_supplier.php'>Go to Add Supplier</a>";
    }
}
?>
