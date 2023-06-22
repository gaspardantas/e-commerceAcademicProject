<?php
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page or any other desired page
//header(("Location: ../index.php"));
//exit();
echo "<script>alert('Logout Successful. You will be directed to the main page')</script>";
echo "<script>window.location.href = '../index.php';</script>";

?>