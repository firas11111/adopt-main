<?php

//Starting session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//User is prompted to login prior to check out
if (!isset($_COOKIE['user']) OR !isset($_COOKIE['pass'])) {
    header("Location: login.php");
    exit();
}

//empty the shopping cart
$_SESSION['cart']='';

//set page title
$page_title= "YNWA Online Store Checkout";

//display the header
require_once('includes/header.php');

?>

    <h2>Checkout</h2>
    <p>Thank you for shopping with us.</p>

<?php
session_destroy();
include('includes/footer.php');
?>