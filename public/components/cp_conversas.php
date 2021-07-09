<main class="container-fluid">
    <section class="row sticky-top mt-lg-5">
        <div class="col-12 text-center mt-lg-3 background">
            <p class="pt-5 pb-1 d-md-block d-none h">Conversas</p>
            <p class="pt-5 pb-1 d-md-none h_pequeno">Conversas</p>
        </div>
    </section>


    <section class="row my-3  justify-content-center">
<?php
require_once "connections/connection.php";

if (isset($_SESSION["nome"])) {
    $USER_NAME = $_SESSION["nome"];

}

if (isset($_SESSION["id"])) {
    $USER_ID = $_SESSION["id"];

}

if (isset($_SESSION["role"])) {
    $USER_ROLE = $_SESSION["role"];

}


$link = new_db_connection();

$stmt = mysqli_stmt_init($link);


$stmt = mysqli_stmt_init($link);
$query = "SELECT grupo_id_grupo , nome_grupo FROM users_has_grupo INNER JOIN grupo ON grupo_id_grupo = id_grupo  WHERE users_id_users = ? ;";


if (mysqli_stmt_prepare($stmt, $query)) {

    mysqli_stmt_bind_param($stmt, 'i', $USER_ID);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_bind_result($stmt,  $grupo_id_grupo, $nome_grupo );

    while (mysqli_stmt_fetch($stmt)) { ?>


        <article class="col-11 borda_post shadow my-3 p-4">
            <div class="row">
                <div class="col-10">
                    <a href="chat.php?chat=<?= $grupo_id_grupo ?>" class="text-decoration-none"><h2 class="mb-0
                    py-3">Tribo de <?= $nome_grupo ?></h2></a>
                </div>
                <div class="col-2 my-auto">
                    <i class="far fa-comment-dots fa-3x float-right"></i>
                </div>
            </div>
        </article>
    <?php }
    mysqli_stmt_close($stmt);
}
mysqli_close($link);


?>

    </section>
</main>