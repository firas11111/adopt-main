<?php


$page_title = "List a New Animal";

require_once 'includes/header.php';
require_once 'includes/database.php';

//retrieve, sanitize, and escape input from the form
$animal_name = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'animal_name', FILTER_SANITIZE_STRING)));
$animal_type = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'animal_type', FILTER_SANITIZE_STRING)));
$animal_breed = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'animal_breed', FILTER_SANITIZE_STRING)));
$animal_age = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'animal_age', FILTER_SANITIZE_NUMBER_INT)));
$animal_bio = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'animal_bio', FILTER_SANITIZE_STRING)));
$author_id = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'author_id', FILTER_SANITIZE_NUMBER_INT)));
$animal_picture = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'animal_picture', FILTER_SANITIZE_STRING)));


//define the MySQL insert statement
$sql = "INSERT INTO animals VALUES (NULL, '$animal_name', '$animal_type', '$animal_breed', '$animal_age', '$animal_bio', '$author_id', '$animal_picture')";

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

echo "You animal is now listed for adoption.";
$conn->close();

include 'includes/footer.php';
