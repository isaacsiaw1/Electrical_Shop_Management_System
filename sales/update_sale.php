<?php
include '../config/auth.php';
include '../config/database.php';

$Sale_ID = $_POST['Sale_ID'];
$Sale_Date = $_POST['Sale_Date'];

$sql = "UPDATE Sale SET Sale_Date='$Sale_Date' WHERE Sale_ID=$Sale_ID";

if(mysqli_query($conn, $sql)){
    header("Location: index.php");
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Save Sale</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    
</body>
</html>