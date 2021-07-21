<?php
require_once "connections/connection.php";
session_start();

if (isset($_GET["grupo"])) {
    $id = $_GET["grupo"];
}

$link = new_db_connection();

$stmt = mysqli_stmt_init($link);
$query = "SELECT descricao_grupo, sedes_id_sede_grupo FROM grupo
WHERE id_grupo = ?";

if (mysqli_stmt_prepare($stmt, $query)) {


    mysqli_stmt_bind_param($stmt, 'i', $id);

    if (mysqli_stmt_execute($stmt)) {

        mysqli_stmt_bind_result($stmt, $descricao_grupo, $sede_grupo);

        if (!mysqli_stmt_fetch($stmt)) {
            echo "ERRO 1";
        }
    } else {}
    //mostrar o codigo a apresentar
} else {
    echo "ERRORRRRR: " . mysqli_error($link);
}
mysqli_stmt_close($stmt);
?>

<main class="container-fluid background">
    <section class="row">
        <a id="fechar" href="definicoestribo.php?grupo=<?= $id ?>" class="text-right col-12 pt-4 pr-4"><i class="fas fa-times fa-2x"></i></a>
        <div class="col-12 text-center">
            <p class="pb-1 d-md-block d-none h">A foto da tua tribo</p>
            <p class="pb-1 d-md-none h_pequeno">A foto da tua tribo</p>
        </div>
    </section>

    <form method="post" role="form" id="form" action="scripts/sc_alterar_foto_perfil_tribo.php?grupo=<?= $id ?>" enctype="multipart/form-data">
        <p class="px-3 pt-3">Alterar foto da Tribo</p>
        <div class="form-group rounded bg-light py-4">
            <input type="file" class="form-control w-50 mx-auto border-0 bg-light" name="imagem" id="customFile"/>
        </div>

        <div class="row justify-content-center mt-3">
            <button class="btnlogin py-3 text-center col-4" type="submit">Alterar foto</button>
        </div>

    </form>

</main>

