<?php
//Define the parameters
$host = "localhost";
$login = "phpuser";
$password = "phpuser";
$database = "final_i210";

// connect to the mysql sever
$conn = @new mysqli($host, $login, $password, $database);

//error handling message
if ($conn->connect_errno) {
    $errno = $conn->connect_errno;
    $errmsg = $conn->connect_error;
    die("Connection to database failed:($errno)$errmsg.");
}