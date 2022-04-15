<?php
$title = "SIGN IN PAGE";
$page = 'signon.php';
include('includes/header.php');
include('includes/database.php');
if (isset($Name) && isset($Pass)){
    $sql = "SELECT * FROM users WHERE User_name='$Name' AND Password='$Pass'";
    $query =$dbcon->query($sql);
    if(!$query) {

        $errno = $dbcon->errno;
        $errmsg = $dbcon->error;
        echo "Selection failed with:($errno) $errmsg<br/>\n";
        $dbcon->close();
        include('includes/footer.php');
    }
    $row = $query->fetch_assoc();
    if ($row != NULL){
        echo"<li><p><a href='showcart.php'>Go to Cart</a></p></li>";
        echo "<li><p><a href='logout.php'>Logout</a></p></li>";
        if ($row['First_name']=='Admin'){
            echo "<button><a href='admin/Adminlogin.php'>Admin Console</a></button>";
        }
    }
    else{
        require ('includes/log.php');
    }


}
else{
    require ('includes/log.php');
}

?>

<?php
$dbcon->close();
include ('includes/footer.php');
?>