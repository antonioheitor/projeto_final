<?php
require_once "connections/connection.php";

session_start();

if (isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
}

$link = new_db_connection();

$stmt = mysqli_stmt_init($link);
$query = "SELECT users.nome_users, users.id_users, users.email_users, users.descricao_users, imagem_user FROM users
WHERE users.id_users = ?";

if (mysqli_stmt_prepare($stmt, $query)) {

mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);

mysqli_stmt_bind_result($stmt, $nome,  $id, $email, $descricao, $avatar);

?>

<main class="container-fluid background">
    <section class="row">
        <a id="fechar" href="perfil.php" class="text-right col-12 pt-4 pr-4"><i class="fas fa-times fa-2x"></i></a>
        <div class="col-12 text-center">
            <p class="pb-1 d-md-block d-none h">A tua foto de perfil</p>
            <p class="pb-1 d-md-none h_pequeno">A tua foto de perfil</p>
        </div>
    </section>

    <?php
    while (mysqli_stmt_fetch($stmt)) {
        ?>
        <form method="post" role="form" id="register-form" action="scripts/sc_alterar_foto_perfil.php" enctype="multipart/form-data">
            <p>Alterar foto de perfil</p>
            <div class="form-group rounded bg-light py-3">
                <input type="file" class="form-control w-50 border-0 bg-light" name="imagem" id="customFile">
            </div>
            <div class="row justify-content-center mt-3">
                <button class="btnlogin py-3 text-center col-4" type="submit">Alterar foto</button>
            </div>
        </form>
        <?php
    }
    mysqli_stmt_close($stmt);
    }?>
</main>
