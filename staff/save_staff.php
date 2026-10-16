<?php
include '../config/database.php';

if(isset($_POST['submit'])){
    $Staff_Name = $_POST['Staff_Name'];
    $Phone = $_POST['Phone'];
    $Position = $_POST['Position'];

    $sql = "INSERT INTO `staff` (`Staff_Name`, `Phone`, `Position`) 
            VALUES ('$Staff_Name', '$Phone', '$Position')";

    if(mysqli_query($conn, $sql)){
        header('Location: index.php');
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
