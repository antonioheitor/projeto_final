<?php

session_start();

if (isset($_SESSION["id_users"])) {
    $id_visitantes = $_SESSION["id_users"];
}


require_once "../connections/connection.php";

$link = new_db_connection();



//verificar os campos do formulário

if (isset($_POST["username"]) && ($_POST["username"]) != "" && isset($_POST["email"]) && ($_POST["email"]) != "" ) {

    $nome_visitante = $_POST["username"];
    $email_visitante = $_POST["email"];
    $roles_id_roles = $_POST["roles_id_roles"];



    $stmt = mysqli_stmt_init($link);

    $query = "UPDATE visitantes SET nome_visitante = ?, email_visitante = ?, roles_id_roles = ? WHERE id_visitantes = ?";


    if (mysqli_stmt_prepare($stmt, $query)) {


        mysqli_stmt_bind_param($stmt, 'ssii', $nome_visitante, $email_visitante, $roles_id_roles, $id_visitantes);

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


