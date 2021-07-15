<?php

require_once ("../connections/connection.php");

session_start();

// UPDATE NOME
if ((isset($_POST["nome_user"]) && ($_POST["nome_user"] != "")) && (isset($_SESSION["id"]))) {
    $nome = $_POST["nome_user"];
    $id = $_SESSION["id"];

    // Create a new DB connection
    $link = new_db_connection();

    /* create a prepared statement */
    $stmt = mysqli_stmt_init($link);

    $query = "UPDATE users
SET nome_users = ?
WHERE id_users = ?";
    if (mysqli_stmt_prepare($stmt, $query)) {
        /* Bind paramenters */
        mysqli_stmt_bind_param($stmt, "si", $nome,  $id);
        /* execute the prepared statement */
        if (!mysqli_stmt_execute($stmt)) {
            echo "Error:" . mysqli_stmt_error($stmt);
        }
        header("Location: ../perfil.php");
        /* close statement */
        mysqli_stmt_close($stmt);
    } else {
        echo("Error description: " . mysqli_error($link));
    }
    /* close connection */
    mysqli_close($link);
}

//UPDATE EMAIL
if ((isset($_POST["email_user"]) && ($_POST["nome_user"] != "")) && (isset($_SESSION["id"]))) {
    $email = $_POST["email_user"];
    $id = $_SESSION["id"];
    // Create a new DB connection
    $link = new_db_connection();

    /* create a prepared statement */
    $stmt = mysqli_stmt_init($link);

    $query = "UPDATE users
SET email_users = ?,
WHERE id_users = ?";
    if (mysqli_stmt_prepare($stmt, $query)) {
        /* Bind paramenters */
        mysqli_stmt_bind_param($stmt, "si", $email,  $id);
        /* execute the prepared statement */
        if (!mysqli_stmt_execute($stmt)) {
            echo "Error:" . mysqli_stmt_error($stmt);
        }else {
            header("Location: ../perfil.php");
        }

        /* close statement */
        mysqli_stmt_close($stmt);
    } else {
        echo("Error description: " . mysqli_error($link));
    }
    /* close connection */
    mysqli_close($link);
}

//UPDATE DESCRIÇÃO
if ((isset($_POST["descricao_users"]) && ($_POST["descricao_users"] != "")) && (isset($_SESSION["id"]))) {
    $descricao = $_POST["descricao_users"];
    $id = $_SESSION["id"];
    // Create a new DB connection
    $link = new_db_connection();

    /* create a prepared statement */
    $stmt = mysqli_stmt_init($link);

    $query = "UPDATE users
SET descricao_users = ?,
WHERE id_users = ?";
    if (mysqli_stmt_prepare($stmt, $query)) {
        /* Bind paramenters */
        mysqli_stmt_bind_param($stmt, "si", $descricao,  $id);
        /* execute the prepared statement */
        if (!mysqli_stmt_execute($stmt)) {
            echo "Error:" . mysqli_stmt_error($stmt);
        }
        header("Location: ../perfil.php");
        /* close statement */
        mysqli_stmt_close($stmt);
    } else {
        echo("Error description: " . mysqli_error($link));
    }
    /* close connection */
    mysqli_close($link);
}


// UPDATE FOTO DE PERFIL
$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["fotomsg"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fotomsg"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        //$uploadOk = 1;
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
if ($_FILES["fotomsg"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fotomsg"]["tmp_name"], $target_file)) {
        $id = $_SESSION['id'];

        $link = new_db_connection();
        $stmt = mysqli_stmt_init($link);
        $imagem = htmlspecialchars( basename( $_FILES["fotomsg"]["name"]));

        $query = "UPDATE users SET imagem_user = "."'$imagem'"."WHERE id_users = "."'$id'";
        if (mysqli_stmt_prepare($stmt, $query)) {
            mysqli_stmt_execute($stmt);
            header("Location: ../definicoes.php");
        } else {
            echo mysqli_stmt_error($stmt);
        }

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}