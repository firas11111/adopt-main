<?php

$page_title = "Animal Details";
require_once ('includes/header.php');
require_once ('includes/database.php');

//retrieves the userid from a query string
if (!filter_has_var(INPUT_GET, 'id')) {
    echo "Error: id wasn't found.";
    require_once ('includes/footer.php');
    exit();
}

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//statement that selects id
$sql = "SELECT * FROM animals WHERE animal_id=" . $id;

//executes above statement
$query = $conn->query($sql);

//Deals with selection erros
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Query failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    require_once('includes/footer.php');
    exit;
}

//retrieves the results
$row = $query->fetch_assoc();


//establish img src to view 

$image = $row['animal_picture'];
$image_src = "images/animals/".$image;
?>

    <h2>Animal Details</h2>
    <table id="animaldetails" class="animaldetails">
        <tr>
            <td class="col1 headShot" >
                <!-- display animal image -->
<!--                --><?//= $row['animal_picture']?>
<!--                --><?//=
//                ?>
                <img src='<?php echo $image_src;  ?>' alt="<?php echo $row['animal_name']?>" >
            </td>
            <td class="col2">
                <h4>Animal ID</h4>
                <h4>Name</h4>
                <h4>Type</h4>
                <h4>Breed</h4>
                <h4>Age</h4>
                <h4>Bio</h4>
                <h4>Posted by:</h4>
            </td>
            <td class="col3">
                <p><?= $row['animal_id']?></p>
                <p><?= $row['animal_name']?></p>
                <p><?= $row['animal_type']?></p>
                <p><?= $row['animal_breed']?></p>
                <p><?= $row['animal_age']?></p>
                <p><?= $row['animal_bio']?></p>
                <p><?= $row['author_id']?></p>
            </td>
        </tr>
    </table>

    <p>
        <a href="editanimals.php?id=<?php echo $row['animal_id'] ?>">Edit</a>
        &nbsp;&nbsp;
        <a href="deleteanimal.php?id=<?php echo $row['animal_id'] ?>">Delete</a>
        &nbsp;&nbsp;<a href="animalslist.php">Cancel</a>
    </p>

<?php

//clean up data and close connection
$query->close();
$conn->close();
require_once ('includes/footer.php');