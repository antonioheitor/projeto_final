<?php

session_start();

if (isset($_SESSION["id_temas"])) {
    $id_temas = $_SESSION["id_temas"];
}


require_once "../connections/connection.php";

$link = new_db_connection();



//verificar os campos do formulário

if (isset($_POST["name"]) && ($_POST["name"]) != "") {

    $nome_tema = $_POST["name"];
    $areas_id_areas = $_POST["areas_id_areas"];




    $stmt = mysqli_stmt_init($link);

    $query = "UPDATE temas SET nome_tema = ?, areas_id_areas = ? WHERE id_temas = ?";


    if (mysqli_stmt_prepare($stmt, $query)) {


        mysqli_stmt_bind_param($stmt, 'sii', $nome_tema, $areas_id_areas, $id_temas);

        if (!mysqli_stmt_execute($stmt)) {

            echo "Error: " . mysqli_stmt_error($stmt);


        }

    } else {
        echo ("Error description :" . mysqli_error($link));
        //mostrar o codigo a apresentar
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);

    header( "Location: ../temas.php");

} else {
    header( "Location: ../index.php");
}


