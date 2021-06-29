<?php

session_start();

if (isset($_SESSION["id_users"])) {
    $id_users = $_SESSION["id_users"];
}


require_once "../connections/connection.php";

$link = new_db_connection();



//verificar os campos do formulário

if (isset($_POST["username"]) && ($_POST["username"]) != "" && isset($_POST["email"]) && ($_POST["email"]) != "" && isset($_POST["descricao"]) && ($_POST["descricao"]) != "" ) {

    $nome_users = $_POST["username"];
    $email_users = $_POST["email"];
    $descricao_users = $_POST["descricao"];
    $imagem_user = $_POST["imagem"];
    $roles_plataforma_id_roles_plataforma = $_POST["roles_plataforma_id_roles_plataforma"];



    $stmt = mysqli_stmt_init($link);

    $query = "UPDATE users SET nome_users = ?, email_users = ?, descricao_users = ?, imagem_user = ?, roles_plataforma_id_roles_plataforma = ?  WHERE id_users = ?";


    if (mysqli_stmt_prepare($stmt, $query)) {


        mysqli_stmt_bind_param($stmt, 'ssssii', $nome_users, $email_users, $descricao_users, $imagem_user, $roles_plataforma_id_roles_plataforma, $id_users);

        if (!mysqli_stmt_execute($stmt)) {

            echo "Error: " . mysqli_stmt_error($stmt);


        }

    } else {
        echo ("Error description :" . mysqli_error($link));
        //mostrar o codigo a apresentar
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);

    header( "Location: ../usuarios.php");

} else {
    header( "Location: ../index.php");
}


