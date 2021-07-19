<?php require_once "../connections/connection.php";

session_start();

if (isset($_SESSION['id']) && isset($_GET["grupo"])) {

    $users_id_users = $_SESSION['id'];
    $grupo_id_grupo = $_GET["grupo"];
    $roles_grupos_id_roles = 6;
}

$link = new_db_connection();

$stmt = mysqli_stmt_init($link);

$query = "INSERT INTO users_has_grupo (users_id_users, grupo_id_grupo, roles_grupos_id_roles) VALUES (?,?,?)";

if (mysqli_stmt_prepare($stmt, $query)) {
    mysqli_stmt_bind_param($stmt, 'iii', $users_id_users, $grupo_id_grupo, $roles_grupos_id_roles );

    // Devemos validar também o resultado do execute!
    if (mysqli_stmt_execute($stmt)) {

        // Acção de sucesso
      header("Location: ../tribo.php?grupo=$grupo_id_grupo");
    } else {
        header("Location: ../tribo.php?grupo=$grupo_id_grupo");
    }
} else {
    // Acção de erro
    header("Location: ../definicoes.php");
    echo "Error:" . mysqli_error($link);
}
mysqli_stmt_close($stmt);
mysqli_close($link);










?>