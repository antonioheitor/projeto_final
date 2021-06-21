<?php

session_start();

if (isset($_SESSION["id_pecas"])) {
    $id_pecas = $_SESSION["id_pecas"];
}


require_once "../connections/connection.php";

$link = new_db_connection();



//verificar os campos do formulário

if (isset($_POST["name"]) && ($_POST["name"]) != "" && isset($_POST["descricao"]) && ($_POST["descricao"]) != "" ) {

    $nome_peca = $_POST["name"];
    $descricao_peca = $_POST["descricao"];
    $ano_peca = $_POST["ano"];
    $imagem_peca = $_POST["imagem"];
    $exposicoes_id_exposicoes = $_POST["exposicoes_id_exposicoes"];



    $stmt = mysqli_stmt_init($link);

    $query = "UPDATE pecas SET nome_peca = ?, descricao_peca = ?, ano_peca = ?, imagem_peca = ?, exposicoes_id_exposicoes = ? WHERE id_pecas = ?";


    if (mysqli_stmt_prepare($stmt, $query)) {


        mysqli_stmt_bind_param($stmt, 'ssisii', $nome_peca, $descricao_peca, $ano_peca, $imagem_peca, $exposicoes_id_exposicoes, $id_pecas);

        if (!mysqli_stmt_execute($stmt)) {

            echo "Error: " . mysqli_stmt_error($stmt);


        }

    } else {
        echo ("Error description :" . mysqli_error($link));
        //mostrar o codigo a apresentar
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);

    header( "Location: ../pecas.php");

} else {
    header( "Location: ../index.php");
}


