<?php
session_start();
include('connect.php');

// recovering ip address saved when user logged in
$ip = $_SESSION['ip'];

// Delete query
$delete_query = "DELETE FROM `cart` WHERE ip_address='$ip'";
mysqli_query($con, $delete_query);

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();


// Redirect to the login page or any other desired page
echo "<script>alert('Logout Successful. You will be directed to the main page')</script>";
echo "<script>window.location.href = '../index.php';</script>";
?>