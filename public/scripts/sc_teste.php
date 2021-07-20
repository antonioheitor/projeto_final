<?php

require_once "../connections/connection.php";

$target_dir = "../../uploads/";
$target_file = $target_dir . basename($_FILES["teste"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

$img_hash = hash('ripemd160', basename($_FILES["teste"]["name"])) . '.'. $imageFileType;

$target_file = $target_dir . $img_hash;


// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($target_file);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($img_hash)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["teste"]["name"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["teste"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars($img_hash) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}