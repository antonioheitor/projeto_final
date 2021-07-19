<?php
require_once "../connections/connection.php";
session_start();

if (isset($_GET['membro']) && isset($_GET["grupo"])) {
    $id_membro = $_GET['membro'];
    $id_grupo = $_GET["grupo"];

    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);
    $query = "DELETE FROM users_has_grupo WHERE users_id_users = ? AND grupo_id_grupo = ?";

    if (mysqli_stmt_prepare($stmt, $query)) {

        mysqli_stmt_bind_param($stmt, 'ii', $id_membro, $id_grupo);

        //Devemos validar também o resultado do execute!
        if (mysqli_stmt_execute($stmt)) {
            //Ação de sucesso
            header("Location: ../membros.php?grupo=$id_grupo");
        } else {
            //Ação de erro
            echo "Error:" . mysqli_error($link);

        }
    } else {
        echo "Error:" . mysqli_error($link);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);
}
