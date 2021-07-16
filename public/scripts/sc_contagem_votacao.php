<?php
require_once "../connections/connection.php";
session_start();

if (isset($_SESSION['id'])) {
    $user = $_SESSION['id'];

    $link = new_db_connection();

    $stmt = mysqli_stmt_init($link);

    $query = "SELECT id_quinzena FROM quinzenas ORDER BY id_quinzena ASC LIMIT 1";

    if (mysqli_stmt_prepare($stmt, $query)) {

        mysqli_stmt_bind_result($stmt, $quinzena);

        //Devemos validar também o resultado do execute!
        if (mysqli_stmt_execute($stmt)) {
            //Ação de sucesso

        } else {
            //Ação de erro
            echo "Error:" . mysqli_error($link);
        }
    } else {
        echo "Error:" . mysqli_error($link);
    }

    $stmt1 = mysqli_stmt_init($link);

    $query1 ="SELECT COUNT(votos.users_id_users1)
FROM votos
WHERE votos.roles_grupos_id_roles = 1 AND votos.quinzenas_id_quinzena = 1"; // corrigir :P

    if (mysqli_stmt_prepare($stmt1, $query1)) {

        //Devemos validar também o resultado do execute!
       if (mysqli_stmt_execute($stmt1)) {
            //Ação de sucesso
            mysqli_stmt_bind_result($stmt1, $contagem);
            echo $query1;
        } else {
            //Ação de erro
            echo "Error:" . mysqli_error($link);
        }
    } else {
        echo "Error:" . mysqli_error($link);
    }
    mysqli_stmt_close($stmt);
    mysqli_stmt_close($stmt1);
}
//1 296 000 segundos em 15 dias


