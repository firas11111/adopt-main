<?php

$page_title = "Animals for Adoption";

require_once 'includes/header.php';
require_once 'includes/database.php';


//statement selecting animals from database
$sql = "SELECT * FROM animals";

//execute above statement
$query = $conn->query($sql);

if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Query failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    require_once ('includes/footer.php');
    exit;
}
?>

    <h2>Animals for Adoption</h2>
    <table id="animals" class="animals">
        <tr>
            <th>Animal Name</th>
        </tr>

        <?php

        //inserts a row into the table for each row of data present
        while (($row = $query-> fetch_assoc()) !== NULL) {
            echo "<tr>";
            echo "<td><a href=animaldetails.php?id=", $row['animal_id'], ">", $row['animal_name'], "</a></td>";

        }
        ?>
    </table>


<?php

//clean up info and close connection
$query->close();
$conn->close();
require 'includes/footer.php';
