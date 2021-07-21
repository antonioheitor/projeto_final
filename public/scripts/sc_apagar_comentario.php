<?php
require_once "../connections/connection.php";

if (isset($_GET['comentario'])) {
    $comentario = $_GET['comentario'];
}

$link = new_db_connection();
$stmt = mysqli_stmt_init($link);
$query = "DELETE FROM comentarios WHERE id_comentario = ?";

if (mysqli_stmt_prepare($stmt, $query)) {
    mysqli_stmt_bind_param($stmt, 'i', $comentario);

    if (mysqli_stmt_execute($stmt)) {
        //Ação de sucesso
        header("Location: ../homepage.php?msg=6#homepagealerta");

    } else {
        //Ação de erro
        header("Location: ../homepage.php?msg=7#homepagealerta");
    }
} else {
    header("Location: ../homepage.php?msg=7#homepagealerta");
}
mysqli_stmt_close($stmt);
mysqli_close($link);
