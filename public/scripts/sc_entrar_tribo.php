<?php require_once "../connections/connection.php";
/*
session_start();

$link = new_db_connection();

$stmt = mysqli_stmt_init($link);

$query = "INSERT INTO users_has_grupo (users_id_users, grupo_id_grupo, roles_grupos_id_roles) VALUES (?,?,?)";

if (mysqli_stmt_prepare($stmt, $query)) {
    mysqli_stmt_bind_param($stmt, 'ii', $users_id_users, $grupo_id_grupo);

    // Devemos validar também o resultado do execute!
    if (mysqli_stmt_execute($stmt)) {
        // Acção de sucesso
        $users_id_users = 13;
        $grupo_id_grupo = 3;
        $roles_grupos_id_roles = 6;
        echo $users_id_users;
        echo $grupo_id_grupo;
        //header("Location: ../perfil_tribo.php");
    } else {
        // Acção de erro
        echo "nao deu";
        //header("Location: ../perfil.php");
      //  echo "Error:" . mysqli_stmt_error($stmt);
    }
} else {
    // Acção de erro
    header("Location: ../definicoes.php");
    echo "Error:" . mysqli_error($link);
}
mysqli_stmt_close($stmt);
mysqli_close($link);

*/










?>