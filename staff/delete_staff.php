<?php
Include '../config/auth.php';
Include '../config/database.php';
Include '../config/functions.php';

$id = $_GET['id'];
$sql = "DELETE FROM `staff` WHERE `Staff_ID` = '$id'";
mysqli_query($conn, $sql);
header('Location: index.php');
exit();
?>

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   

</body>
</html>