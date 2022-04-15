<?php


$page_title = "Delete this animal";

require_once ('includes/header.php');
require_once('includes/database.php');

//retrieve user id from a querystring
if (!filter_has_var(INPUT_GET, 'id')) {
    echo "Error: animal was not found.";
    require_once ('includes/footer.php');
    exit();
}

$animal_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//Define MySQL delete statement
$sql = "DELETE FROM animals WHERE animal_id=$animal_id";

//Execute the query.
$query = @$conn->query($sql);


//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    exit;
}
//confirm delete
echo "This animal has been deleted.";
// close the connection.
$conn->close();

include ('includes/footer.php');
