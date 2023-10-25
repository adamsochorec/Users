<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="upload_file.php" method="post" enctype="multipart/form-data">
        <label for="file">Filename: </label>
        <input type="file" name="file" id="file">
        <br>
        <input type="submit" name="submit" value="Submit">
    </form>
    <hr>
    <form action="delete_uploaded_file.php" method="post">
    <label for="delete">Select file to delete: </label>
    <select name="delete" id="delete"><?php $fileDirectory = "upload/";
    $files = scandir($fileDirectory);
    foreach ($files as $file) {
        if ($file != "." && $file != "..") {
            echo "<option value='$file'>$file</option>";
        }
    } ?></select>
    <input type="submit" name="delete" value="delete">
</form>
</body>
</html>