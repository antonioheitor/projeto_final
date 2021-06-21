<?php

session_start();

if (isset($_SESSION["id_exposi"])) {
    $id_exposicoes = $_SESSION["id_exposi"];
}


require_once "../connections/connection.php";

$link = new_db_connection();



//verificar os campos do formulário

if (isset($_POST["nome"]) && ($_POST["nome"]) != "" && isset($_POST["descricao"]) && ($_POST["descricao"]) != "" ) {

    $nome_exposicao = $_POST["nome"];
    $descricao_exposicao = $_POST["descricao"];
    $imagem_exposicao = $_POST["imagem"];



    $stmt = mysqli_stmt_init($link);

    $query = "UPDATE exposicoes SET nome_exposicao = ?, descricao_exposicao = ?, imagem_exposicao = ? WHERE id_exposicoes = ?";


    if (mysqli_stmt_prepare($stmt, $query)) {


        mysqli_stmt_bind_param($stmt, 'sssi', $nome_exposicao, $descricao_exposicao, $imagem_exposicao, $id_exposicoes);

        if (!mysqli_stmt_execute($stmt)) {

            echo "Error: " . mysqli_stmt_error($stmt);


        }

    } else {
        echo ("Error description :" . mysqli_error($link));
        //mostrar o codigo a apresentar
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);

    header( "Location: ../exposicoes.php");

} else {
    header( "Location: ../index.php");
}


