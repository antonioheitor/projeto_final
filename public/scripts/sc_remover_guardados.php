<?php
require_once "../connections/connection.php";
session_start();

if (isset($_SESSION['id']) && isset($_GET['post'])) {

    $id_user = $_SESSION['id'];
    $id_post = $_GET['post'];

    $link = new_db_connection();

    $stmt = mysqli_stmt_init($link);

    $query = "DELETE FROM users_has_posts WHERE users_id_users = ? AND posts_id_posts = ?";

    if (mysqli_stmt_prepare($stmt, $query)) {

        mysqli_stmt_bind_param($stmt, 'ii', $id_user, $id_post);

        //Devemos validar também o resultado do execute!
        if (mysqli_stmt_execute($stmt)) {
            //Ação de sucesso
            header("Location: ../guardados.php?msg=0#guardadosalterar");
        } else {
            //Ação de erro
            header("Location: ../guardados.php?msg=1#guardadosalterar");
        }
    } else {
        header("Location: ../guardados.php?msg=1#guardadosalterar");
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);
}