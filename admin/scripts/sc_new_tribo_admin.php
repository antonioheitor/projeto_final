<?php
session_start();

require_once "../connections/connection.php";

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



if (isset($_POST["nome_tribo"]) && isset($_POST["descricao_tribo"]) && isset($_POST["sedes_id_sede_grupo"]) && isset($_POST["temas_id_temas"]) ) {
    $nome_grupo = $_POST['nome_tribo'];
    $descricao_grupo = $_POST['descricao_tribo'];

    if ($target_file != null) {
        $imagem_grupo = $target_file;
    }

    $data_criacao_grupo = "2021-07-17";

    $sedes_id_sede_grupo = $_POST['sedes_id_sede_grupo'];
    $temas_id_temas = $_POST['temas_id_temas'];

    $link = new_db_connection();

    $stmt = mysqli_stmt_init($link);

    $query = "INSERT INTO grupo (nome_grupo, descricao_grupo, imagem_grupo, data_criacao_grupo, sedes_id_sede_grupo, temas_id_temas ) VALUES (?,?,?,?,?,?)";

    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_bind_param($stmt, 'ssssii', $nome_grupo, $descricao_grupo, $imagem_grupo, $data_criacao_grupo , $sedes_id_sede_grupo, $temas_id_temas);

        // Devemos validar também o resultado do execute!
        if (mysqli_stmt_execute($stmt)) {
            // Acção de sucesso
            header("Location: ../tribos.php");
        } else {
            // Acção de erro
            header("Location: ../tribos_edit.php");
            echo "Error:" . mysqli_stmt_error($stmt);
        }
    } else {
        // Acção de erro
        header("Location: ../index.php");
        echo "Error:" . mysqli_error($link);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);
} else {
    echo "Campos do formulário por preencher";
}

