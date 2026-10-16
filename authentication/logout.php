<?php
// File: authentication/logout.php

Session_start();

Session_destroy();

Header("Location: login.php");

Exit();

?>
