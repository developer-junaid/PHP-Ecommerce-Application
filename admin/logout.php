<?php
session_start();
 // Logout the admin
 unset($_SESSION['ADMIN_LOGIN']);
 unset($_SESSION['ADMIN_USERNAME']);
 header('location:login.php'); // Redirect
 die();

?>