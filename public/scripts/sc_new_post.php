<?php
require_once "../connections/connection.php";
session_start();

if (isset($_SESSION["id"])) {
    $USER_ID = $_SESSION["id"];
}
$target_dir = "../../uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

$img_hash = hash('ripemd160', basename($_FILES["fileToUpload"]["name"])) . '.'. $imageFileType;
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
if ($_FILES["fileToUpload"]["size"] > 5000000) {
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
        echo "The file " . htmlspecialchars($img_hash) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

if (isset($_POST["titulopost"]) && isset($_POST["descpost"]) && isset($_POST["grupo_id_grupo"]) ) {
    $titulo_post = $_POST['titulopost'];
    $conteudo_post = $_POST['descpost'];

    if ($target_file != null) {
        $imagem_post = $target_file;
    }

    if ($imagem_post == "../../uploads/") {
        $imagem_post = null;
    }

    $users_id_users = $USER_ID;
    $grupo_id_grupo = $_POST['grupo_id_grupo'];

    $link = new_db_connection();

    $stmt = mysqli_stmt_init($link);

    $query = "INSERT INTO posts (titulo_post, conteudo_post, imagem_post, data_criacao_post, users_id_users, grupo_id_grupo ) VALUES (?,?,?,NOW(),?,?)";

    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_bind_param($stmt, 'sssii', $titulo_post, $conteudo_post, $imagem_post, $USER_ID, $grupo_id_grupo);

        // Devemos validar também o resultado do execute!
        if (mysqli_stmt_execute($stmt)) {
            // Acção de sucesso
            header("Location: ../homepage.php?msg=2#homepagealerta");
        } else {
            // Acção de erro
            header("Location: ../homepage.php?msg=3#homepagealerta");
        }
    } else {
        // Acção de erro
        header("Location: ../homepage.php?msg=3#homepagealerta");
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);
} else {
    echo "Campos do formulário por preencher";
}