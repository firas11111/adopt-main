<?php

$page_title = "Edit animal information";

require_once ('includes/header.php');
require_once('includes/database.php');

if (!filter_has_var(INPUT_GET, 'id')) {
    echo "Error: Animal ID was not found.";
    require_once ('includes/footer.php');
    exit();
}
$animal_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//Select statement
$sql = "SELECT * FROM animals WHERE animal_id =" . $animal_id;

//execute the query
$query = $conn->query($sql);

//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    //include the footer
    require_once ('includes/footer.php');
    exit;
}

//retrieve results
$row = $query->fetch_assoc();

//display results in a table
?>

<h2>Edit Animal Information</h2>

<form name="editanimal" action="updateanimals.php" method="get">
    <table class="animaldetails">
        <tr>
            <th>Animal ID</th>
            <td><input name="animal_id" value="<?php echo $row['animal_id'] ?>" readonly="readonly" /></td>
        </tr>
        <tr>
            <th>Animal Name</th>
            <td><input name="animal_name" value="<?php echo $row['animal_name'] ?>" size="50" required /></td>
        </tr>
        <tr>
            <th>Animal Type</th>
            <td><input name="animal_type" value="<?php echo $row['animal_type'] ?>" size="30" required /></td>
        </tr>
        <tr>
            <th>Breed</th>
            <td><input name="animal_breed" value="<?php echo $row['animal_breed'] ?>" size="30" required /></td>
        </tr>
        <tr>
            <th>Age</th>
            <td><input type="number" name="animal_age" value="<?php echo $row['animal_age'] ?>" size="40" required /></td>
        </tr>
        <tr>
            <th>Bio</th>
            <td><input type="text" name="animal_bio" value="<?php echo $row['animal_bio'] ?>" required /></td>
        </tr>
        <tr>
            <th>Posted by</th>
            <td><input name="author_id" value="<?php echo $row['author_id'] ?>" readonly="readonly" /></td>
        </tr>

    </table>

    <br>
    <input type="submit" value="Update">&nbsp;&nbsp;
    <input type="button" onclick="window.location.href='userdetails.php?id=<?php echo
    $row['animal_id'] ?>'" value="Cancel">
</form>



<?php
// clean up resultsets when we're done with them!
$query->close();

// close the connection.
$conn->close();

//include the footer
require_once ('includes/footer.php');
?>

