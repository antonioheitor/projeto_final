<?php

session_start();

if (isset($_SESSION["id_sede_grupo"])) {
    $id_sede_grupo = $_SESSION["id_sede_grupo"];
}


require_once "../connections/connection.php";

$link = new_db_connection();



//verificar os campos do formulário

if (isset($_POST["nome_sede"]) && ($_POST["nome_sede"]) != "" && isset($_POST["latitude_sede"]) && isset($_POST["longitude_sede"])) {

    $nome_sede = $_POST["nome_sede"];
    $latitude_sede = $_POST["latitude_sede"];
    $longitude_sede = $_POST["longitude_sede"];



    $stmt = mysqli_stmt_init($link);

    $query = "UPDATE sedes SET nome_sede = ?, latitude_sede = ?, longitude_sede = ? WHERE id_sede_grupo = ?";


    if (mysqli_stmt_prepare($stmt, $query)) {


        mysqli_stmt_bind_param($stmt, 'siii', $nome_sede, $latitude_sede, $longitude_sede, $id_sede_grupo);

        if (!mysqli_stmt_execute($stmt)) {

            echo "Error: " . mysqli_stmt_error($stmt);


        }

    } else {
        echo ("Error description :" . mysqli_error($link));
        //mostrar o codigo a apresentar
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);

    header( "Location: ../sedes.php");

} else {
    header( "Location: ../index.php");
}


