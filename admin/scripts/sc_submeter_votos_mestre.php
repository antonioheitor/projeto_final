<?php

require_once "../connections/connection.php";
session_start();


if (isset($_SESSION['id']) && (isset($_GET['id']) && (isset($_GET['id'] )!= '')) && (isset($_GET['grupo']) && (isset
            ($_GET['grupo'] )!= '')) && (isset($_GET['contagem']) && (isset
            ($_GET['role'] )!= '')) && (isset
        ($_GET['role'] )!= '')) {


    $id_user= $_GET['id'];
    $id_grupo = $_GET["grupo"];
    $contagem =  $_GET['contagem'];
    $role = $_GET['role'];


    $link = new_db_connection();

    $stmt = mysqli_stmt_init($link);

    $query = "SELECT users_id_users, grupo_id_grupo, roles_grupos_id_roles FROM users_has_grupo WHERE roles_grupos_id_roles = ? AND grupo_id_grupo = ?";

    if (mysqli_stmt_prepare($stmt, $query)) {

        mysqli_stmt_bind_param($stmt, 'ii', $role, $id_grupo);

        //Devemos validar também o resultado do execute!
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_bind_result($stmt, $id_user, $id_grupo, $role);

            echo "CHECK 1";

        } else {
            //Ação de erro
            echo "Error:" . mysqli_error($link);
        }
    } else {
        echo "Error:" . mysqli_error($link);
    }
    mysqli_stmt_close($stmt);



    $stmt = mysqli_stmt_init($link);

    $query = "UPDATE users_has_grupo SET roles_grupos_id_roles = 6 WHERE grupo_id_grupo = ? AND users_id_users = ? AND roles_grupos_id_roles = ?";

    if (mysqli_stmt_prepare($stmt, $query)) {

        mysqli_stmt_bind_param($stmt, 'iii',  $id_grupo, $users, $role);

        echo $role;
        //Devemos validar também o resultado do execute!
        if (!mysqli_stmt_execute($stmt)) {
            echo "Error: " . mysqli_stmt_error($stmt);
        } else {
            //Ação de erro
            echo "CHECK 2";
        }
    } else {
        echo "Error:" . mysqli_error($link);
    }
    mysqli_stmt_close($stmt);



    $stmt = mysqli_stmt_init($link);

    $query = "UPDATE users_has_grupo SET roles_grupos_id_roles = ? WHERE users_id_users = ? AND grupo_id_grupo = ?";

    if (mysqli_stmt_prepare($stmt, $query)) {


        mysqli_stmt_bind_param($stmt, 'iii', $role, $id_user, $id_grupo);

        //Devemos validar também o resultado do execute!
        if (!mysqli_stmt_execute($stmt)) {

            echo "Error: " . mysqli_stmt_error($stmt);


        } else {
            header("Location: ../../admin/index.php");
        }
    } else {
        echo "Error:" . mysqli_error($link);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);

}


