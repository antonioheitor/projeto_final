<?php
require_once ("../connections/connection.php");
session_start();

if (isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
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
// UPDATE NOME
    if ((isset($_POST["nome_user"]) && (isset($_POST["email_user"])) && (isset($_POST["descricao_users"])) && ($_POST["nome_user"] != "")) && $target_file != null) {
        $nome = $_POST["nome_user"];
        $email = $_POST["email_user"];
        $imagem = $target_file;
        $descricao = $_POST["descricao_users"];

        // Create a new DB connection
        $link = new_db_connection();

        /* create a prepared statement */
        $stmt = mysqli_stmt_init($link);

        $query = "UPDATE users SET nome_users = ?, email_users = ?, descricao_users = ?, imagem_user = ? WHERE id_users = ?";
        if (mysqli_stmt_prepare($stmt, $query)) {
            /* Bind paramenters */
            mysqli_stmt_bind_param($stmt, "ssssi", $nome, $email, $descricao, $imagem, $id);
            /* execute the prepared statement */
            if (!mysqli_stmt_execute($stmt)) {
                echo "Error:" . mysqli_stmt_error($stmt);
            }
            header("Location: ../perfil.php?msg=1#alterarperfil");            /* close statement */
            mysqli_stmt_close($stmt);
        } else {
            header ("Location: ../perfil.php?msg=0#alterarperfil");
        }
        /* close connection */
        mysqli_close($link);
    } else {
        echo "FALTAM VALORES";
    }
} else {

    if ((isset($_POST["nome_user"]) && (isset($_POST["email_user"])) && (isset($_POST["descricao_users"])) && ($_POST["nome_user"] != ""))) {
        $nome = $_POST["nome_user"];
        $email = $_POST["email_user"];

        $descricao = $_POST["descricao_users"];


        // Create a new DB connection
        $link = new_db_connection();

        /* create a prepared statement */
        $stmt = mysqli_stmt_init($link);

        $query = "UPDATE users SET nome_users = ?, email_users = ?, descricao_users = ? WHERE id_users = ?";
        if (mysqli_stmt_prepare($stmt, $query)) {
            /* Bind paramenters */
            mysqli_stmt_bind_param($stmt, "sssi", $nome, $email, $descricao, $id);
            /* execute the prepared statement */
            if (!mysqli_stmt_execute($stmt)) {
                echo "Error:" . mysqli_stmt_error($stmt);
            }
            header("Location: ../perfil.php?msg=1#alterarperfil");
            /* close statement */
            mysqli_stmt_close($stmt);
        } else {
            header ("Location: ../perfil.php?msg=0#alterarperfil");
        }
        /* close connection */
        mysqli_close($link);
    } else {
        echo "FALTAM VALORES";
    }

}