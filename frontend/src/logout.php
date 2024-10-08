<?php
session_start();


session_unset();  // Clear all session variables
session_destroy();  // Destroy the session
setcookie("USER", "", time() - 3600, "/"); // Deletes the cookie
header("Location: login.php");  // Redirect to login page
exit();
?>

