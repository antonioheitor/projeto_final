<?php
require_once ("../connections/connection.php");
session_start();

if (isset($_GET["grupo"])) {
    $id = $_GET["grupo"];
}

$target_dir = "../../uploads/";
$target_file = $target_dir . basename($_FILES["imagem"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

$img_hash = hash('ripemd160', basename($_FILES["imagem"]["name"])) . '.'. $imageFileType;

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
if ($_FILES["imagem"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

/*If no errors registred, print the success message
if (isset($_POST['submit']) && !$errors) {
    // mysql_query("update SQL statement ");
    echo "Image Uploaded Successfully!";
}*/

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars($img_hash) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


if ($target_file != null) {
        $imagem = $target_file;

        // Create a new DB connection
        $link = new_db_connection();

        /* create a prepared statement */
        $stmt = mysqli_stmt_init($link);

        $query = "UPDATE grupo SET imagem_grupo = ? WHERE id_grupo = ?";
        if (mysqli_stmt_prepare($stmt, $query)) {
            /* Bind paramenters */
            mysqli_stmt_bind_param($stmt, "si", $imagem, $id);
            /* execute the prepared statement */
            if (!mysqli_stmt_execute($stmt)) {
                echo "Error:" . mysqli_stmt_error($stmt);
            }
            header("Location: ../perfil_tribo.php?grupo=$id&msg=1#alertaperfiltribo");
            /* close statement */
            mysqli_stmt_close($stmt);
        } else {
            header("Location: ../perfil_tribo.php?grupo=$id&msg=0#alertaperfiltribo");
        }
        /* close connection */
        mysqli_close($link);
    } else {
        echo "FALTAM VALORES";
}