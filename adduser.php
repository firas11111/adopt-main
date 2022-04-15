<?php
$title = "ACCOUNT CREATION PAGE";
$page = 'adduser.php';
include('includes/header.php');
include('includes/database.php');





$fname = $dbcon->real_escape_string(trim(filter_input(INPUT_POST, 'First_name', FILTER_SANITIZE_STRING)));
$lname = $dbcon->real_escape_string(trim(filter_input(INPUT_POST, 'Last_name', FILTER_SANITIZE_STRING)));
$user = $dbcon->real_escape_string(trim(filter_input(INPUT_POST, 'User_name', FILTER_SANITIZE_STRING)));
$pass = $dbcon->real_escape_string(trim(filter_input(INPUT_POST, 'Password', FILTER_SANITIZE_STRING)));
$email = $dbcon->real_escape_string(trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL)));
$gender = $dbcon->real_escape_string(trim(filter_input(INPUT_POST, 'gender_id', FILTER_SANITIZE_NUMBER_INT)));
$dob = $dbcon->real_escape_string(trim(filter_input(INPUT_POST, 'date_of_birth', FILTER_DEFAULT)));

//define the MySQL insert statement

$sql = "INSERT INTO users (User_id,First_name,Last_name,User_name,Password,email,gender_id,date_of_birth)
VALUES  (NULL, '$fname', '$lname','$user','$pass', '$email','$gender','$dob')";
$query =@$dbcon->query($sql);


//execute the query


//handle error
if (!$query) {
    $errno = $dbcon->errno;
    $errmsg = $dbcon->error;
    echo "Insertion failed with: ($errno) $errmsg<br/>\n";
    $dbcon->close();
    include 'includes/footer.php';
    exit;
}

echo "<h3 align='center'>The new user account has been created.</h3>";

$dbcon->close();
include 'includes/footer.php';
?>