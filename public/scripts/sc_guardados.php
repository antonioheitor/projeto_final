<?php
require_once "../connections/connection.php";
session_start();

if (isset($_SESSION["id"]) && isset($_GET["post"])) {
    $id_user = $_SESSION["id"];
    $id_post = $_GET["post"];

    $link = new_db_connection();

    $stmt = mysqli_stmt_init($link);

    $query = "INSERT INTO users_has_posts(users_id_users, posts_id_posts, data) VALUES(?, ?, NOW())";

    if (mysqli_stmt_prepare($stmt, $query)) {

        mysqli_stmt_bind_param($stmt, 'ii', $id_user, $id_post);

        //Devemos validar também o resultado do execute!
        if (mysqli_stmt_execute($stmt)) {
            //Ação de sucesso
            header("Location: ../perfil.php");
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