<?php
session_start();
require_once "../connections/connection.php";

if (isset($_SESSION["nome"])) {
    $USER_NAME = $_SESSION["nome"];

}

if (isset($_SESSION["id"])) {
    $USER_ID = $_SESSION["id"];

}

if (isset($_SESSION["role"])) {
    $USER_ROLE = $_SESSION["role"];

}

if (isset($_GET["post"])) {
    $ID_POST = $_GET["post"];

}




$target_dir = "../../uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

if (isset($_POST["descpost"])) {

    $texto_comentario = $_POST["descpost"];

    if ($target_file != "../../uploads/") {
        $imagem_comentario = $target_file;
    }

    $link = new_db_connection();

    $stmt = mysqli_stmt_init($link);

    $query = "INSERT INTO comentarios(texto_comentario, imagem_comentario, users_id_users, post_id_post) VALUES (?,?,?,?)";

    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_bind_param($stmt, 'ssii', $texto_comentario, $imagem_comentario, $USER_ID, $ID_POST);

        // Devemos validar também o resultado do execute!
        if (mysqli_stmt_execute($stmt)) {

            // Acção de sucesso
            header("Location: ../homepage.php");
        } else {
echo "<br>texto".$texto_comentario;
echo "<br>imagem".$imagem_comentario;
echo "<br>id".$USER_ID;
echo "<br>post".$ID_POST;
            // Acção de erro
            //header("Location: ../homepage.php");
            echo "Errorr:" . mysqli_stmt_error($stmt);
        }
    } else {
        // Acção de erro
        //header("Location: ../perfil.php");
        echo "Error:" . mysqli_error($link);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);





} else {
    echo "Campos do formulário por preencher";
}



?>