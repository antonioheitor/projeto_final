<?php
require_once "../connections/connection.php";
session_start();

if (isset($_SESSION['id'])) {
    $user = $_SESSION['id'];

    $link = new_db_connection();

    $stmt = mysqli_stmt_init($link);

    $query = "SELECT id_quinzena FROM quinzenas ORDER BY id_quinzena ASC LIMIT 1";

    if (mysqli_stmt_prepare($stmt, $query)) {
        //Devemos validar também o resultado do execute!
        if (mysqli_stmt_execute($stmt)) {
            //Ação de sucesso
            mysqli_stmt_bind_result($stmt, $quinzena);
            while (mysqli_stmt_fetch($stmt)){
            }

        } else {
            //Ação de erro
            echo "Error:" . mysqli_error($link);
        }
    } else {
        echo "Error:" . mysqli_error($link);
    }

    $stmt1 = mysqli_stmt_init($link);

    $query1 ="SELECT votos.users_id_users1, users.nome_users,
COUNT(votos.users_id_users1)
FROM votos
INNER JOIN users
ON users.id_users = votos.users_id_users1
WHERE votos.roles_grupos_id_roles = 1 AND votos.quinzenas_id_quinzena = ?
GROUP BY votos.users_id_users1
ORDER BY votos.users_id_users DESC LIMIT 1";


    if (mysqli_stmt_prepare($stmt1, $query1)) {

        mysqli_stmt_bind_param($stmt1, 'i', $quinzena);


        //Devemos validar também o resultado do execute!
       if (mysqli_stmt_execute($stmt1)) {
            //Ação de sucesso
           mysqli_stmt_bind_result($stmt1, $user_id, $user_name, $contagem);

           while (mysqli_stmt_fetch($stmt1)) {

               header("Location: sc_submeter_votos.php?id=$user_id&nome=$user_name&contagem=$contagem");
           };


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


