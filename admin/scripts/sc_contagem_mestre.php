<?php
require_once "../connections/connection.php";
session_start();

if (isset($_SESSION['id']) && isset($_GET['grupo'])) {
    $user = $_SESSION['id'];
    $id_grupo = $_GET['grupo'];

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
    mysqli_stmt_close($stmt);



    $stmt1 = mysqli_stmt_init($link);

    $query1 ="SELECT votos.users_id_users1, votos.grupo_id_grupo, users.nome_users,
COUNT(votos.users_id_users1)
FROM votos
INNER JOIN users
ON users.id_users = votos.users_id_users1
WHERE votos.roles_grupos_id_roles = 4 AND votos.quinzenas_id_quinzena = ? AND votos.grupo_id_grupo = ?
GROUP BY votos.users_id_users1
ORDER BY votos.users_id_users DESC LIMIT 1";

    if (mysqli_stmt_prepare($stmt1, $query1)) {

        mysqli_stmt_bind_param($stmt1, 'ii', $quinzena, $id_grupo);

        //Devemos validar também o resultado do execute!
        if (mysqli_stmt_execute($stmt1)) {
            //Ação de sucesso
            mysqli_stmt_bind_result($stmt1, $user_id,  $id_grupo, $user_name, $contagem);

            while (mysqli_stmt_fetch($stmt1)) {
                $role = 4;
                header("Location: sc_submeter_votos_mestre.php?id=$user_id&grupo=$id_grupo&contagem=$contagem&role=$role");
            }

            if ($contagem == '') {
                header("Location: ../../admin/votacoes.php");
            }

        } else {
            //Ação de erro

        }
    } else {
    }
    mysqli_stmt_close($stmt1);

}


//1 296 000 segundos em 15 dias


