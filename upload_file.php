<?php

if (
    (($_FILES["file"]["type"] == "image/gif")
        || ($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/pjpeg")
        || ($_FILES["file"]["type"] == "image/jpg")
        || ($_FILES["file"]["type"] == "image/png"))
    && ($_FILES["file"]["size"] < 20000000)
) {
    if ($_FILES["file"]["error"] > 0) {
        echo "Error MOFO: " . $_FILES["file"]["error"] . "<br>";
    } else {
        echo "Upload: " . $_FILES["file"]["name"] . "<br>";
        echo "Type: " . $_FILES["file"]["type"] . "<br>";
        echo "Size: " . ($_FILES["file"]["size"] / 1024) . "Kb<br>";
        echo "Stored in: " . $_FILES["file"]["tmp_name"];

        if (file_exists("upload/" . $_FILES["file"]["name"])) {
            echo "<br>Can't upload " . $_FILES["file"]["name"] . " already exists. ";
        } else {
            move_uploaded_file(
                $_FILES["file"]["tmp_name"],
                "upload/" . $_FILES["file"]["name"]
            );
            echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
        }
    }
} else {
    echo "Invalid file";
}
if (isset($_POST["delete"])){
    $fileName = $_POST["delete"];
    $filePath = "upload/" . $filename;
    if (file_exists($filePath)) {
        unlink($filePath);
        echo "File '$fileName' has been deleted.";
    } else {
        echo "File '$fileName' not found for deletion MOFO.";
    }
}
?>