<?php
require_once ("../connections/connection.php");
session_start();
// fotomsg

if (isset($_GET["chat"])) {
    $grupo_id_grupo = $_GET["chat"];
}

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
}

if (isset($_POST["mensagem"]) && (isset($_POST['mensagem']) != '')) {
    $mensagem = $_POST['mensagem'];

    $link = new_db_connection();

    $stmt = mysqli_stmt_init($link);

    $query = "INSERT INTO mensagens (mensagem_chat, grupo_id_grupo, users_id_users, data_msg) VALUES (?, ?, ?, CURRENT_TIMESTAMP)";

    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_bind_param($stmt, 'sii', $mensagem, $grupo_id_grupo, $id);

        // Devemos validar também o resultado do execute!
        if (mysqli_stmt_execute($stmt)) {
            // Acção de sucesso
            // header("Location: ../chat.php?chat=$grupo_id_grupo");
        } else {

            //header("Location: ../chat.php?chat=$grupo_id_grupo&msg=0#chatalerta");
            // Acção de erro


        }
    } else {
        // Acção de erro
        // header("Location: ../chat.php?chat=$grupo_id_grupo&msg=0#chatalerta");
    }
    mysqli_stmt_close($stmt);

} else {

    $target_dir = "../../uploads/";
    $target_file = $target_dir . basename($_FILES["fotomsg"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $img_hash = hash('ripemd160', basename($_FILES["fotomsg"]["name"])) . '.' . $imageFileType;

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
    if ($_FILES["fotomsg"]["size"] > 5000000) {
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
        if (move_uploaded_file($_FILES["fotomsg"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars($img_hash) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    $imagem_chat = $target_file;

    $link = new_db_connection();

    $stmt1 = mysqli_stmt_init($link);

    $query1 = "INSERT INTO mensagens (imagem_chat, grupo_id_grupo, users_id_users, data_msg) VALUES (?, ?, ?, CURRENT_TIMESTAMP)";

    if (mysqli_stmt_prepare($stmt1, $query1)) {
        mysqli_stmt_bind_param($stmt1, 'sii', $imagem_chat, $grupo_id_grupo, $id);

        // Devemos validar também o resultado do execute!
        if (mysqli_stmt_execute($stmt1)) {
            // Acção de sucesso
           header("Location: ../chat.php?chat=$grupo_id_grupo");
        } else {
            header("Location: ../chat.php?chat=$grupo_id_grupo&msg=0#chatalerta");



        }
    } else {
        // Acção de erro
        header("Location: ../chat.php?chat=$grupo_id_grupo&msg=0#chatalerta");
    }
    mysqli_stmt_close($stmt1);
}












/*if ($target_file != null) {


} else {

    if (isset($_POST["mensagem"])) {
        $mensagem = $_POST['mensagem'];

        $link = new_db_connection();

        $stmt = mysqli_stmt_init($link);

        $query = "INSERT INTO mensagens (mensagem_chat, grupo_id_grupo, users_id_users, data_msg) VALUES (?, ?, ?, ?, CURRENT_TIMESTAMP)";

        if (mysqli_stmt_prepare($stmt, $query)) {
            mysqli_stmt_bind_param($stmt, 'sii', $mensagem, $grupo_id_grupo, $id);

            // Devemos validar também o resultado do execute!
            if (mysqli_stmt_execute($stmt)) {
                // Acção de sucesso
                // header("Location: ../chat.php?chat=$grupo_id_grupo");
            } else {

                header("Location: ../chat.php?chat=$grupo_id_grupo&msg=0#chatalerta");
                // Acção de erro


            }
        } else {
            // Acção de erro
            // header("Location: ../chat.php?chat=$grupo_id_grupo&msg=0#chatalerta");
        }
        mysqli_stmt_close($stmt);


    }

}
*/
mysqli_close($link);


