<?php

session_start();

if (isset($_SESSION["id_grupo"])) {
    $id_grupo = $_SESSION["id_grupo"];
}


require_once "../connections/connection.php";

$link = new_db_connection();



//verificar os campos do formulário

if (isset($_POST["nome"]) && ($_POST["nome"]) != "" && isset($_POST["descricao"]) && ($_POST["descricao"]) != "" ) {

    $nome_grupo = $_POST["nome"];
    $descricao_grupo = $_POST["descricao"];
    $imagem_grupo = $_POST["imagem"];
    $sedes_id_sede_grupo= $_POST["sedes_id_sede_grupo"];
    $temas_id_temas = $_POST["temas_id_temas"];


    $stmt = mysqli_stmt_init($link);

    $query = "UPDATE grupo SET nome_grupo = ?, descricao_grupo = ?, imagem_grupo = ?, sedes_id_sede_grupo = ?, temas_id_temas = ? WHERE id_grupo = ?";


    if (mysqli_stmt_prepare($stmt, $query)) {


        mysqli_stmt_bind_param($stmt, 'sssiii', $nome_grupo, $descricao_grupo, $imagem_grupo, $sedes_id_sede_grupo, $temas_id_temas, $id_grupo);

        if (!mysqli_stmt_execute($stmt)) {

            echo "Error: " . mysqli_stmt_error($stmt);


        }

    } else {
        echo ("Error description :" . mysqli_error($link));
        //mostrar o codigo a apresentar
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);

    header( "Location: ../tribos.php");

} else {
    header( "Location: ../index.php");
}


