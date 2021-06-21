<?php

session_start();

if (isset($_SESSION["id_dono"])) {
    $id_donos = $_SESSION["id_dono"];
}


require_once "../connections/connection.php";

$link = new_db_connection();



//verificar os campos do formulário

if (isset($_POST["nome_dono"]) && ($_POST["nome_dono"]) != "" && isset($_POST["email_dono"]) && ($_POST["email_dono"]) != "" ) {

    $nome_dono = $_POST["nome_dono"];
    $email_dono = $_POST["email_dono"];
    $telefone_done = $_POST["telefone_dono"];
    $imagem_dono = $_POST["imagem_dono"];

    $stmt = mysqli_stmt_init($link);

    $query = "UPDATE donos SET nome_dono = ?, email_dono = ?, telefone_done = ?, imagem_dono = ? WHERE id_donos = ?";


    if (mysqli_stmt_prepare($stmt, $query)) {


        mysqli_stmt_bind_param($stmt, 'ssisi', $nome_dono, $email_dono, $telefone_done, $imagem_dono, $id_donos);

        if (!mysqli_stmt_execute($stmt)) {

            echo "Error: " . mysqli_stmt_error($stmt);


        }

    } else {
        echo ("Error description :" . mysqli_error($link));
        //mostrar o codigo a apresentar
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);

    header( "Location: ../donos_info.php");

} else {
    header( "Location: ../index.php");
}


