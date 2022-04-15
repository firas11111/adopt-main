<?php
$page_title = "List a New Animal";

include ('includes/header.php');
?>
    <h2>Rehome an Animal</h2>
        <p>Fill out the form below to list a new animal for adoption and let us help you find a purrfect new home! </p>

    <form action="addanimal.php" method="get" enctype="text/plain">
        <table class="newanimal">
            <tr>
                <td>Animal Name: </td>
                <td><input name="animal_name" type="text" required /></td>
            </tr>
            <tr>
                <td>Cat or Dog: </td>
                <td><input name="animal_type" type="text" required /></td>
                </td>
            </tr>
            <tr>
                <td>Breed:</td>
                <td><input type="text" name="animal_breed" required /></td>
            </tr>
            <tr>
                <td>Age:</td>
                <td><input type="number" name="animal_age" required /></td>
            </tr>
            <tr>
                <td>Bio:</td>
                <td><input type="text" name="animal_bio" required /></td>
            </tr>
            <tr>
                <td>Your User ID:</td>
                <td><input type="text" name="author_id" required /></td>
            </tr>
            <tr>
                <td>Animal Photo:</td>
                <td><input type="file" name="animal_photo" required /></td>
            </tr>

        </table>
        <br>
        <input type="submit" name="Submit" id="Submit" value="List Animal" />
    </form>

<?php
include ('includes/footer.php');
