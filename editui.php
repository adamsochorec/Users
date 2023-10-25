<?php require_once("/connection.php"); ?>
<html>
<body>
<h1 align="center">Edit image</h1>

<?php
$lname=$_GET['lname'];
$query = "SELECT * FROM Users WHERE ID='$lname'";
$result=mysqli_query($connection, "UPDATE Users SET fname = 'ALOIS' WHERE rank = '10'");

while($row=mysqli_fetch_array($result)){
echo "<b>Id :</b> $row[ID] <br/>";
    echo "<b>Description:</b> $row[description] <br/>";
?>
    <form name="upload" method="post" action="editpro.php">
        <h1>Image edit</h1>
        <h2>Here you can edit your image description!</h2>
        <b>Description:</b><br> <textarea name="desc"><?php echo $row['description']; ?></textarea><br />
        <input name="lname" type="hidden" value="<?php echo $lname; ?>">
        <input name="Submit" type="submit" value="Save">
    </form>


<?php
}
mysqli_close($connection);
?>
</body>
</html>