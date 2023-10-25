<?php
if (isset($_POST["delete"])){
    $fileName = $_POST["delete"];
    $filePath = "upload/" . $fileName;
    if (file_exists($filePath)) {
        unlink($filePath);
        echo "File '$fileName' has been deleted.";
    } else {
        echo "File '$fileName' not found for deletion MOFO.";
    }
}
?>