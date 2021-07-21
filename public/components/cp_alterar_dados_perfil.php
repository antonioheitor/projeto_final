<?php
require_once "connections/connection.php";

session_start();

if (isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
}

$link = new_db_connection();

$stmt = mysqli_stmt_init($link);
$query = "SELECT users.nome_users, users.id_users, users.email_users, users.descricao_users FROM users
WHERE users.id_users = ?";

if (mysqli_stmt_prepare($stmt, $query)) {

mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);

mysqli_stmt_bind_result($stmt, $nome,  $id, $email, $descricao);

?>

<main class="container-fluid background">
    <section class="row">
        <a id="fechar" href="definicoes.php" class="text-right col-12 pt-4 pr-4"><i class="fas fa-times fa-2x"></i></a>
        <div class="col-12 text-center">
            <p class="pb-1 d-md-block d-none h">Os teus dados</p>
            <p class="pb-1 d-md-none h_pequeno">Os teus dados</p>
        </div>
    </section>

    <?php
    while (mysqli_stmt_fetch($stmt)) {
        ?>
        <form method="post" role="form" id="register-form" action="scripts/sc_alterar_dados_perfil.php"
              enctype="multipart/form-data">
            <div class="form-group rounded">
                <p>Nome</p>
                <input type="text" aria-describedby="name" name="nome_user" value="<?=$nome ?>">
            </div>
            <div class="form-group rounded">
                <p>Email</p>
                <input type="email" class="inputs" aria-describedby="email" name="email_user" value="<?=$email ?>">
            </div>

            <!---<div class="form-group rounded">
                <input type="password" class="inputs" aria-describedby="password" name="password_user" placeholder="Palavra-Passe">
            </div> -->
            <div class="form-group rounded">
                <p>Descrição</p>
                <input type="text" class="inputs inputdescricao" aria-describedby="description" name="descricao_users" value="<?=$descricao ?>">
            </div>
            <div class="row justify-content-center mt-3">
                <button class="btnlogin py-3 text-center col-4" type="submit">Alterar dados</button>
            </div>
        </form>
        <?php
    }
    mysqli_stmt_close($stmt);
}?>
</main>
