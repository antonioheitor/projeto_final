<?php
require_once "../connections/connection.php";
session_start();


if (isset($_SESSION['id']) && isset($_GET['grupo'])) {
    $user = $_SESSION['id'];
    $id_grupo = $_GET['grupo'];

    $link = new_db_connection();
    $stmt1 = mysqli_stmt_init($link);
    $query1 = "SELECT posts.users_id_users, posts.grupo_id_grupo,
COUNT(posts.users_id_users) AS contagem
FROM posts
WHERE posts.grupo_id_grupo = ?
GROUP BY posts.users_id_users
ORDER BY contagem DESC LIMIT 2";

    if (mysqli_stmt_prepare($stmt1, $query1)) {

        mysqli_stmt_bind_param($stmt1, 'i', $id_grupo);

        //Devemos validar também o resultado do execute!
        if (mysqli_stmt_execute($stmt1)) {
            //Ação de sucesso
            mysqli_stmt_bind_result($stmt1, $user_id, $id_grupo, $contagem);

            mysqli_stmt_store_result($stmt1);

            $ids = array();

            while (mysqli_stmt_fetch($stmt1)) {
                array_push($ids, "$user_id");
            }

        } else {
            //Ação de erro
            echo "Error";
        }
    } else {
    }
    mysqli_stmt_close($stmt1);


    $stmt = mysqli_stmt_init($link);

    $query = "UPDATE users_has_grupo SET roles_grupos_id_roles = 4 WHERE grupo_id_grupo = ? AND users_id_users = ? AND roles_grupos_id_roles = 3";

    if (mysqli_stmt_prepare($stmt, $query)) {

        mysqli_stmt_bind_param($stmt, 'ii', $id_grupo, $users);

        //Devemos validar também o resultado do execute!
        if (!mysqli_stmt_execute($stmt)) {
            echo "Error: " . mysqli_stmt_error($stmt);
        } else {
            //Ação de erro
        }
    } else {
        echo "Error:" . mysqli_error($link);
    }
    mysqli_stmt_close($stmt);



    for ($i = 0; $i < count($ids); $i++) {
        $ids[$i];
        $id_user = $ids[$i];

        $stmt = mysqli_stmt_init($link);

        $query = "UPDATE users_has_grupo SET roles_grupos_id_roles = 3 WHERE users_id_users = ? AND grupo_id_grupo = ?";

        if (mysqli_stmt_prepare($stmt, $query)) {
            mysqli_stmt_bind_param($stmt, 'ii',  $id_user, $id_grupo);
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


    }



}


//1 296 000 segundos em 15 dias


