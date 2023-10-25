<?php 
require("connection.php");

$id=$_POST['lname'];
$newDescription = $_POST['desc'];
      $query = "SELECT * FROM Users WHERE ID='$lname'";
$result = mysqli_query($connection, $query) or die('Error, query failed');

mysqli_query($connection, "UPDATE img SET description='$newDescription' WHERE ID='$lname'");


mysqli_close($connection);

// Redirect to delete.php.
header("location:index.php");

?>
