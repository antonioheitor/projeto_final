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

if (isset($_POST["descpost"])) {
    $texto_comentario = $_POST["descpost"];
};



$link = new_db_connection();

$stmt = mysqli_stmt_init($link);

$query = "INSERT INTO comentarios(texto_comentario, imagem_comentario, users_id_users, post_id_post) VALUES (?,NULL,?,?)";

if (mysqli_stmt_prepare($stmt, $query)) {
    mysqli_stmt_bind_param($stmt, 'sii', $texto_comentario, $USER_ID, $ID_POST);

    // Devemos validar também o resultado do execute!
    if (mysqli_stmt_execute($stmt)) {

        // Acção de sucesso
      header("Location: ../homepage.php");
    } else {

        // Acção de erro
      header("Location: ../homepage.php");
        echo "Error:" . mysqli_stmt_error($stmt);
    }
} else {
    // Acção de erro
    header("Location: ../perfil.php");
    echo "Error:" . mysqli_error($link);
}
    mysqli_stmt_close($stmt);
    mysqli_close($link);



?>