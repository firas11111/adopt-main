<?php

$page_title = "Update Animal details";

require_once('includes/header.php');
require_once('includes/database.php');

//retrieve, sanitize, and escape all fields from the form
$animal_id = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'animal_id', FILTER_SANITIZE_NUMBER_INT)));
$animal_name = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'animal_name', FILTER_SANITIZE_STRING)));
$animal_type = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'animal_type', FILTER_SANITIZE_STRING)));
$animal_breed = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'animal_breed', FILTER_SANITIZE_STRING)));
$animal_age = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'animal_age', FILTER_SANITIZE_NUMBER_INT)));
$animal_bio = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'animal_bio', FILTER_SANITIZE_STRING)));

//Define MySQL update statement
$sql = "UPDATE animals SET
    animal_name='$animal_name',
    animal_type='$animal_type',
    animal_breed='$animal_breed',
    animal_age='$animal_age',
    animal_bio='$animal_bio' WHERE animal_id= $animal_id";

//Execute the query.
$query = @$conn->query($sql);


//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Connection Failed with: $errno, $errmsg<br/>\n";
    include('includes/footer.php');
    exit;
}
echo "The animal has been updated.";

// close the connection.
$conn->close();

include('includes/footer.php');

