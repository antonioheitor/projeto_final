<?php
require_once "../connections/connection.php";
session_start();

if (isset($_SESSION['id'])) {

    $id_user = $_SESSION['id'];

    $link = new_db_connection();

    $stmt = mysqli_stmt_init($link);
    $stmt1 = mysqli_stmt_init($link);
    $stmt2 = mysqli_stmt_init($link);

    $query = "DELETE FROM users_has_posts WHERE users_has_posts.users_id_users = ?";
    $query1 = "DELETE FROM users_has_grupo WHERE users_has_grupo.users_id_users = ?";
    $query2 = "DELETE FROM users WHERE users.id_users = ?";

    //QUERY
    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_bind_param($stmt, 'i', $id_user);
        //Devemos validar também o resultado do execute!
        if (mysqli_stmt_execute($stmt)) {


            //QUERY 1
            if (mysqli_stmt_prepare($stmt1, $query1)) {
                mysqli_stmt_bind_param($stmt1, 'i', $id_user);
                //Devemos validar também o resultado do execute!
                if (mysqli_stmt_execute($stmt1)) {


                    //QUERY 2
                    if (mysqli_stmt_prepare($stmt2, $query2)) {
                        mysqli_stmt_bind_param($stmt2, 'i', $id_user);
                        //Devemos validar também o resultado do execute!
                        if (mysqli_stmt_execute($stmt2)) {
                            //Ação de sucesso
                            header("Location: ../login.php");
                        } else {
                            //Ação de erro
                            echo "Error:" . mysqli_error($link);
                        }
                    } else {
                        echo "Error:" . mysqli_error($link);
                    }
                    mysqli_stmt_close($stmt2);


                } else {
                    //Ação de erro
                    echo "Error:" . mysqli_error($link);}
            } else {
                echo "Error:" . mysqli_error($link);
            }
            mysqli_stmt_close($stmt1);


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