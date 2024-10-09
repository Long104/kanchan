<?php
session_start();
// setcookie('cart', '', time() - 3600, "/");
// setcookie('purchases', '', time() - 3600, "/");
session_unset();  
session_destroy();  setcookie("USER", "", time() - 3600, "/"); 
header("Location: login.php"); exit();
?>

