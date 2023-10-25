<?php
require("connection.php");

$username = $_POST['username'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$rank = $_POST['rank'];
$description = $_POST['description'];
$mymail = "adasoc01@easv365.dk";
$regexp = "/^[A-z0-9_-]+([.][A-z0-9_]+)*[@][A-z0-9_-]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/";
$regexpSemi = "/^[A-Z]+$/";
$regexpMessage = "/[a-zA-Z]{2,}/";

$sql = "INSERT INTO `Users` (`ID`, `username`, `fname`, `lname`, `email`, `rank`, `description`) 
VALUES (NULL, '$username', '$fname', '$lname', '$email', '$rank', '$description')";

if (!preg_match($regexpMessage, $username)) {
    echo "Your username sucks";
} elseif (!preg_match($regexpSemi, $fname)) {
    echo "Your first name sucks";
} elseif (!preg_match($regexpSemi, $lname)) {
    echo "Your last name sucks";
} elseif (!preg_match($regexp, $email)) {
    echo "Email wrong";
} elseif (!preg_match($regexpMessage, $description)) {
    echo "Your description sucks";
} elseif (empty($email) || empty($description) || empty($username)) {
    echo "Empty field, you stupid ass";
} elseif (!mysqli_query($connection, $sql)) {
    die("Could not add: " . mysqli_error($connection));
} elseif ($_POST['button']) {
    $body = "$description\n\nEmail: $email";
    mail($mymail, $username, $body, "From: $email\n");
    echo "Thanks for your Email";
} else {
    header("location: index.php");
}
?>



