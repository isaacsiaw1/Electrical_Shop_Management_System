<?php
// File: authentication/login.php

Session_start();

include '../config/database.php';

$message = "";

If(isset($_POST['login']))
{
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    If($username == "admin" && $password == "admin123")
    {
        $_SESSION['admin'] = "Administrator";
        Header("Location: ../index.php");
        Exit;
    }
    Else
    {
        $message = "Invalid Username or Password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="header">
<h1>Electrical Workshop Management System</h1>
<h2>Administrator Login</h2>
</div>

<div class="container">
<br>
<form method="post">
<table>
<tr>
<td>Username</td>
<td><input type="text"name="username" placeholder="admin" required></td>
</tr>
<tr>
<td>Password</td>
<td><input type="password" name="password" placeholder="admin123" required></td>
</tr>
<tr>
<td colspan="2" align="center">
<input type="submit" name="login" value="Login" class="btn">
</td>
</tr>
</table>
</form>

<h3 style="color:red;text-align:center;">
<?php echo $message; ?>
</h3>

</div>
</body>
</html>


