<?php
require_once "../connections/connection.php";
session_start();

if (isset($_SESSION['id']) && isset($_GET['voto']) && isset($_GET['grupo'])) {
    $user = $_SESSION['id'];
    $user_votado = $_GET['voto'];
    $grupo = $_GET['voto'];

    $link = new_db_connection();

    $stmt = mysqli_stmt_init($link);

    $query = "INSERT INTO votos (quinzenas_id_quinzena, grupo_id_grupo, users_id_users, users_id_users1, roles_grupos_id_roles)
VALUES (1, ?, ?, ?, ?)";

    if (mysqli_stmt_prepare($stmt, $query)) {

        mysqli_stmt_bind_param($stmt, 'iiii', $grupo, $user, $user_votado, $role);

        foreach ($_POST['role'] as $role)

        //Devemos validar também o resultado do execute!
        if (mysqli_stmt_execute($stmt)) {
            //Ação de sucesso
            header("Location: ../membros.php");
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
