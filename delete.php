<?php
require_once("includes/connection.php"); 

if(isset($_GET['lname']))
{
    $lname = $_GET['lname'];
    $sql = "DELETE FROM Users WHERE lname = '$lname'";

    if(!mysqli_query($connection, $sql)){
        die("stupid" . mysqli_error($connection));
    }
    else {
        header("Location: index.php");
    }
}
else {
    header("Location: index.php");
}