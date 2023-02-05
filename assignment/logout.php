<?php
session_start(); //starts a new session
session_unset(); //unsets all the sessions available
session_destroy(); //destroys the current session
header("Location: login.php"); //redirects user to the login page
exit(); //exits the script
?>
<!--code used for logout from https://www.w3schools.blog/php-program-to-create-login-and-logout-using-sessions-->
