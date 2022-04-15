<?php
if (session_status() == PHP_SESSION_NONE){
    session_start();
}

// Retrieve the session variable named “cart” and store it in a variable named “cart” //
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
} else {
    $cart = array();
}

//if animal id cannot be found, terminate script.
if (!filter_has_var(INPUT_GET,'id')) {
    $error = "animal id not found. Operation cannot proceed.<br><br>";
    header("Location: error.php?m=$error");
    die();
}

//retrieve animal id and make sure it is a numeric value.
$id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);
if (!is_numeric($id)) {
    $error = "Invalid animal id. Operation cannot proceed.<br><br>";
    header("Location: error.php?m=$error");
    die();
}

if (array_key_exists($id, $cart)) {
    $cart[$id] = $cart[$id] + 1;
} else {
    $cart[$id] = 1;
}

//update the session variable
$_SESSION['cart'] = $cart;

//redirect to the showcart.php page.
header('Location: showcart.php');