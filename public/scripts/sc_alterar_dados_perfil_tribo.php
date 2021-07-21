<?php

session_start();

if (isset($_GET["grupo"])) {
    $id = $_GET["grupo"];
}

require_once("../connections/connection.php");
$link = new_db_connection();

if ((isset($_POST["descricao_grupo"]) && (isset($_POST["sedes_id_sede_grupo"])) && ($_POST["descricao_grupo"] != "") )) {
    $descricao_grupo = $_POST["descricao_grupo"];
    $sedes_id_sede_grupo = $_POST["sedes_id_sede_grupo"];

    // Create a new DB connection


    /* create a prepared statement */
    $stmt = mysqli_stmt_init($link);

    $query = "UPDATE grupo SET descricao_grupo = ?, sedes_id_sede_grupo = ? WHERE id_grupo = ?";
    if (mysqli_stmt_prepare($stmt, $query)) {
        /* Bind paramenters */
        mysqli_stmt_bind_param($stmt, "sii", $descricao_grupo, $sedes_id_sede_grupo, $id);
        /* execute the prepared statement */
        if (!mysqli_stmt_execute($stmt)) {
            echo "Error:" . mysqli_stmt_error($stmt);
        }
        header("Location: ../perfil_tribo.php?grupo=$id&msg=1#alertaperfiltribo");
        /* close statement */
        mysqli_stmt_close($stmt);
    } else {
        header("Location: ../perfil_tribo.php?grupo=$id&msg=0#alertaperfiltribo");
    }
    /* close connection */
    mysqli_close($link);
} else {
    echo "FALTAM VALORES";
}