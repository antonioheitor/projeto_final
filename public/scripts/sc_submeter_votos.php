<?php

require_once "../connections/connection.php";
session_start();
//select id user, grupo e do role where id user = ? , role = 1  E DEPOIS CRL update da tabela
if (isset($_SESSION['id'])) {
    $user = $_SESSION['id'];
    $users_id_users = $_GET["id"];


    $link = new_db_connection();

    $stmt = mysqli_stmt_init($link);

    $query = "SELECT users_id_users, grupo_id_grupo, roles_grupos_id_roles FROM users_has_grupo WHERE roles_grupos_id_roles = 1 AND grupo_id_grupo = 6;";

    if (mysqli_stmt_prepare($stmt, $query)) {



        //Devemos validar também o resultado do execute!
        if (mysqli_stmt_execute($stmt)) {


            mysqli_stmt_bind_result($stmt, $id_users, $id_grupo, $id_roles);

            echo "Error: " . mysqli_stmt_error($stmt);


        } else {
            //Ação de erro
            echo "Error:" . mysqli_error($link);
        }
    } else {
        echo "Error:" . mysqli_error($link);
    }
    mysqli_stmt_close($stmt);



    $stmt = mysqli_stmt_init($link);

    $query = "UPDATE users_has_grupo SET roles_grupos_id_roles = 6 WHERE grupo_id_grupo = ? AND users_id_users = ?";

    if (mysqli_stmt_prepare($stmt, $query)) {

        mysqli_stmt_bind_param($stmt, 'iii',  $roles_users, $id_grupo, $users_id_users);

        //Devemos validar também o resultado do execute!
        if (!mysqli_stmt_execute($stmt)) {

            echo "Error: " . mysqli_stmt_error($stmt);


        } else {
            //Ação de erro
            echo "Error:" . mysqli_error($link);
        }
    } else {
        echo "Error:" . mysqli_error($link);
    }
    mysqli_stmt_close($stmt);

}

$roles_grupos_id_roles = 1;

    $stmt = mysqli_stmt_init($link);

    $query = "UPDATE users_has_grupo SET roles_grupos_id_roles = ? WHERE users_id_users = ? ";

    if (mysqli_stmt_prepare($stmt, $query)) {

        mysqli_stmt_bind_param($stmt, 'ii', $roles_users, $users_id_users);

        //Devemos validar também o resultado do execute!
        if (!mysqli_stmt_execute($stmt)) {

            echo "Error: " . mysqli_stmt_error($stmt);


        } else {
            //Ação de erro
            echo "Error:" . mysqli_error($link);
        }
    } else {
        echo "Error:" . mysqli_error($link);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);
