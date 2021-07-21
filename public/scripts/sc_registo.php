<?php
require_once "../connections/connection.php";

$target_dir = "../../uploads/";
$target_file = $target_dir . basename($_FILES["imgperfil"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

$img_hash = hash('ripemd160', basename($_FILES["imgperfil"]["name"])) . '.'. $imageFileType;

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
if ($_FILES["imgperfil"]["size"] > 5000000) {
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
    if (move_uploaded_file($_FILES["imgperfil"]["tmp_name"], $target_file)) {
        /* list($width, $height) = getimagesize($target_file);
        if ($width = $height) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
            echo "Sorry, the image must be 1:1";
        }*/
        echo "The file " . htmlspecialchars($img_hash) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

if ($uploadOk = 1) {
    if (isset($_POST["nome_user"]) && isset($_POST["email_user"]) && isset($_POST["password_user"])  && isset($_POST["descricao_users"]) ) {
        $nome_users = $_POST['nome_user'];
        $email_users = $_POST['email_user'];
        $password_hash = password_hash($_POST['password_user'], PASSWORD_DEFAULT);
        $descricao_users = $_POST['descricao_users'];
        $imagem_user =  $target_file  ;
        $roles_plataforma_id_roles_plataforma = 2;

        $link = new_db_connection();

        $stmt = mysqli_stmt_init($link);
        $query = "INSERT INTO users (nome_users, email_users, password_hash, descricao_users, imagem_user, roles_plataforma_id_roles_plataforma ) VALUES (?,?,?,?,?,?)";

        if (mysqli_stmt_prepare($stmt, $query)) {
            mysqli_stmt_bind_param($stmt, 'sssssi', $nome_users, $email_users, $password_hash, $descricao_users, $imagem_user, $roles_plataforma_id_roles_plataforma);

            // Devemos validar também o resultado do execute!
            if (mysqli_stmt_execute($stmt)) {
                // Acção de sucesso
                header("Location: ../login.php");
            } else {
                // Acção de erro
                header("Location: ../register.php?msg=0#login");
                echo "Error:" . mysqli_stmt_error($stmt);
            }
        } else {
            // Acção de erro
            header("Location: ../register.php?msg=0#login");
            echo "Error:" . mysqli_error($link);
        }
        mysqli_stmt_close($stmt);
        mysqli_close($link);
    } else {
        echo "Campos do formulário por preencher";
    }
}