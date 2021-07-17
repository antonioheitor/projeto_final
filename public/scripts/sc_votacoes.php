<?php
require_once "../connections/connection.php";
session_start();

if (isset($_SESSION['id']) && isset($_GET['voto']) && isset($_GET['grupo']) && isset($_GET['tema_tribo'])) {
    $user = $_SESSION['id'];
    $user_votado = $_GET['voto'];
    $grupo = $_GET['grupo'];
    $tema = $_GET['tema_tribo'];

    $link = new_db_connection();

    $stmt = mysqli_stmt_init($link);

    $query = "SELECT id_quinzena FROM quinzenas ORDER BY id_quinzena ASC LIMIT 1";

    $stmt2 = mysqli_stmt_init($link);

    $query2 = "INSERT INTO votos (quinzenas_id_quinzena, grupo_id_grupo, users_id_users, users_id_users1, roles_grupos_id_roles)
VALUES (?, ?, ?, ?, ?)";


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

    if (mysqli_stmt_prepare($stmt2, $query2)) {

        mysqli_stmt_bind_param($stmt2, 'iiiii', $quinzena, $grupo, $user, $user_votado, $role);

        foreach ($_POST['role'] as $role)

        //Devemos validar também o resultado do execute!
        if (mysqli_stmt_execute($stmt2)) {
            //Ação de sucesso
            header("Location: ../membros.php?tema_tribo=$tema");
        } else {
            //Ação de erro
            echo "Error:" . mysqli_error($link);
        }
    } else {
        echo "Error:" . mysqli_error($link);
    }
    mysqli_stmt_close($stmt2);


}
//1 296 000 segundos em 15 dias


