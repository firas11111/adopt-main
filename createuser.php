<?php


$page_title = "Create an Account";

require_once 'includes/header.php';
require_once 'includes/database.php';

//retrieve, sanitize, and escape input from the form
$user_name = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'user_name', FILTER_SANITIZE_STRING)));
$full_name = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'full_name', FILTER_SANITIZE_STRING)));
$user_email = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'user_email', FILTER_SANITIZE_EMAIL)));
$DOB = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'DOB', FILTER_SANITIZE_STRING)));
$address = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'address', FILTER_SANITIZE_STRING)));
$city = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'city', FILTER_SANITIZE_STRING)));
$state = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'state', FILTER_SANITIZE_STRING)));


//define the MySQL insert statement
$sql = "INSERT INTO users VALUES (NULL, '$user_name', '$full_name', '$user_email', '$DOB', '$address', '$city', '$state')";

//execute the query
$query = @$conn->query($sql);

//handle error
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Insertion failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    include 'includes/footer.php';
    exit;
}

echo "Your user account has been created.";
$conn->close();

include 'includes/footer.php';

