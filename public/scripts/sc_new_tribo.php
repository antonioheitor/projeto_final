<?php
session_start();

if (isset($_SESSION["id"])) {
    $USER_ID = $_SESSION["id"];
}

require_once "../connections/connection.php";

$target_dir = "../../uploads/";
$target_file = $target_dir . basename($_FILES["img_grupo"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["img_grupo"]["tmp_name"]);
    if ($check !== false) {
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
if ($_FILES["img_grupo"]["size"] > 5000000) {
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
    if (move_uploaded_file($_FILES["img_grupo"]["tmp_name"], $target_file)) {
        list($width, $height) = getimagesize($target_file);

        if ($width > $height) {
            if ($width > $height * 2) {
                $uploadOk = 1;
                echo $uploadOk;
            }
        } else {
            $uploadOk = 0;
            echo "Sorry, the image must be 4:3";
        }
        echo "The file " . htmlspecialchars(basename($_FILES["img_grupo"]["name"])) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

if ($uploadOk == 1) {
    if (isset($_POST["descricao_tribo"]) && isset($_POST["sedes_id_sede_grupo"]) && isset($_POST["temas_id_temas"])) {

        $descricao_grupo = $_POST['descricao_tribo'];

        if ($target_file != null) {
            $imagem_grupo = $target_file;
        }

        $sedes_id_sede_grupo = $_POST['sedes_id_sede_grupo'];

        $temas_id_temas = $_POST['temas_id_temas'];

        $link = new_db_connection();

        $stmt = mysqli_stmt_init($link);

        $query = "SELECT temas.id_temas, temas.nome_tema FROM temas
WHERE temas.id_temas = ?";

        if (mysqli_stmt_prepare($stmt, $query)) {
            mysqli_stmt_bind_param($stmt, 'i', $temas_id_temas);

            // Devemos validar também o resultado do execute!
            if (mysqli_stmt_execute($stmt)) {
                // Acção de sucesso
                mysqli_stmt_execute($stmt);

                mysqli_stmt_bind_result($stmt, $temas_id_temas, $nome_tema);

                while (mysqli_stmt_fetch($stmt)) {

                }
            } else {
                // Acção de erro
                header("Location: ../perfil.php");
                echo "Error:" . mysqli_stmt_error($stmt);
            }
        }

        $stmt1 = mysqli_stmt_init($link);
        if ($sedes_id_sede_grupo == "NULL") {
            $query1 = "INSERT INTO grupo (nome_grupo, descricao_grupo, imagem_grupo, data_criacao_grupo, sedes_id_sede_grupo, temas_id_temas) VALUES (?,?,?,NOW(),NULL,?)";
            if (mysqli_stmt_prepare($stmt1, $query1)) {
                mysqli_stmt_bind_param($stmt1, 'sssi', $nome_tema, $descricao_grupo, $imagem_grupo, $temas_id_temas);

                // Devemos validar também o resultado do execute!
                if (mysqli_stmt_execute($stmt1)) {
                    // Acção de sucesso
                     header("Location: ../perfil.php");
                } else {
                    // Acção de erro

                    //  echo "Error:" . mysqli_stmt_error($stmt1);
                }
            } else {
                // Acção de erro

                echo "Error:" . mysqli_error($link);
            }
            mysqli_stmt_close($stmt);
            mysqli_stmt_close($stmt1);
            mysqli_close($link);


        } else {
            $query1 = "INSERT INTO grupo (nome_grupo, descricao_grupo, imagem_grupo, data_criacao_grupo, sedes_id_sede_grupo, temas_id_temas) VALUES (?,?,?,NOW(),?,?)";
            if (mysqli_stmt_prepare($stmt1, $query1)) {
                mysqli_stmt_bind_param($stmt1, 'sssii', $nome_tema, $descricao_grupo, $imagem_grupo, $sedes_id_sede_grupo, $temas_id_temas);

                // Devemos validar também o resultado do execute!
                if (mysqli_stmt_execute($stmt1)) {
                    // Acção de sucesso
                    header("Location: ../perfil.php");
                } else {
                    // Acção de erro
                    echo "oi" . $sedes_id_sede_grupo;
                    //  echo "Error:" . mysqli_stmt_error($stmt1);
                }
            } else {
                // Acção de erro

                echo "Error:" . mysqli_error($link);
            }
            mysqli_stmt_close($stmt);
            mysqli_stmt_close($stmt1);
            mysqli_close($link);
        }
    }else {
        echo "Campos do formulário por preencher";
    }
}

