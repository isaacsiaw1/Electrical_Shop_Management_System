<?php
// File: config/auth.php
if (session_status() === PHP_SESSION_NONE){
session_start();
}

If (!isset($_SESSION['admin'])) {
    header("Location: authentication/login.php");
    Exit();
}
?>



