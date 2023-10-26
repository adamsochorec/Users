<?php
require_once("includes/connection.php"); 

$username = $_POST['username'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$rank = $_POST['rank'];
$password = $_POST['password'];
$shapassword = sha1($password);
$mymail = "adasoc01@easv365.dk";
$regexp = "/^[A-z0-9_-]+([.][A-z0-9_]+)*[@][A-z0-9_-]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/";
$regexpSemi = "/^[a-zA-Z]+$/";
$regexpMessage = "/[a-zA-Z]{2,}/";

$sql = "INSERT INTO `Users` (`ID`, `username`, `fname`, `lname`, `email`, `rank`, `password`) 
VALUES (NULL, '$username', '$fname', '$lname', '$email', '$rank', '$shapassword')";

if (!preg_match($regexpMessage, $username)) {
    echo "Your username sucks";
} elseif (!preg_match($regexpSemi, $fname)) {
    echo "Your first name sucks";
} elseif (!preg_match($regexpSemi, $lname)) {
    echo "Your last name sucks";
} elseif (!preg_match($regexp, $email)) {
    echo "Email wrong";
} elseif (!preg_match($regexpMessage, $password)) {
    echo "Your password sucks";
} elseif (empty($email) || empty($password) || empty($username)) {
    echo "Empty field, you stupid ass";
} elseif (!mysqli_query($connection, $sql)) {
    die("Could not add: " . mysqli_error($connection));
} elseif ($_POST['button']) {
    $body = "$password\n\nEmail: $email";
    mail($mymail, $username, $body, "From: $email\n");
    echo "Thanks for your Email";
} else {
    header("location: inxex.php");
}
?>



