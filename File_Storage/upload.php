<?php
if (isset($_POST["submit"])) {
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["file"]["name"]);
    $uploadOk = true;
    $targetFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["file"]["tmp_name"]);

    // Check if image file is real
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ". <br>";
        $uploadOk = true;
    } else {
        echo "File is not an image. <br>";
        $uploadOk = false;
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.<br>";
        $uploadOk = false;
    }

    // Limit file size
    if ($_FILES["file"]["size"] > 2097152) {
        echo "Sorry, your file is too large.<br>";
        $uploadOk = false;
    }

    // Allow certain file formats
    if (
        $targetFileType != "jpg" && $targetFileType != "png" && $targetFileType != "jpeg"
    ) {
        echo "Sorry, only JPG, JPEG, PNG files are allowed.<br>";
        $uploadOk = false;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == false) {
        echo "Sorry, your file was not uploaded.<br>";
    } else { //try to upload the file
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
            echo "The file " . basename($_FILES["file"]["name"]) . " has been uploaded.<br>";
        } else { // if somehow fails throw an error message
            echo "Sorry, there was an error uploading your file.<br>";
        }
    }
}
?>