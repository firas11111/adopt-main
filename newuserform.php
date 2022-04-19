<?php
$page_title = "Create a New User";

include ('includes/header.php');
?>
    <h2>Create an Account</h2>
    <p>Fill out the form below to make your account and start listing animals, sending messages, or adopt an animal! </p>

    <form action="createuser.php" method="get" enctype="text/plain">
        <table class="newuser">
            <tr>
                <td>User Name: </td>
                <td><input name="user_name" type="text" required /></td>
            </tr>
            <tr>
                <td>Full Name: </td>
                <td><input name="full_name" type="text" required /></td>
                </td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="email" name="user_email" required /></td>
            </tr>
            <tr>
                <td>Date of Birth:</td>
                <td><input type="date" name="DOB" required /></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td><input type="text" name="address" required /></td>
            </tr>
            <tr>
                <td>City:</td>
                <td><input type="text" name="city" required /></td>
            </tr>
            <tr>
                <td>State:</td>
                <td><input type="text" name="state" required /></td>
            </tr>

        </table>
        <br>
        <input type="submit" name="Submit" id="Submit" value="Create Account" />
    </form>

<?php
include ('includes/footer.php');

