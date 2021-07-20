<?php
require_once "connections/connection.php";
session_start();

if (isset($_SESSION["id"])) {
    $USER_ID = $_SESSION["id"];
}

$link = new_db_connection();

$stmt = mysqli_stmt_init($link);

$query = "SELECT users_has_posts.users_id_users, users_has_posts.posts_id_posts, users.nome_users, users.imagem_user, posts.users_id_users, posts.titulo_post, posts.conteudo_post, posts.imagem_post, posts.data_criacao_post, grupo.nome_grupo
FROM posts
INNER JOIN users
ON posts.users_id_users = users.id_users
INNER JOIN users_has_posts
ON users_has_posts.posts_id_posts = posts.id_posts
INNER JOIN grupo
ON posts.grupo_id_grupo = grupo.id_grupo
WHERE users_has_posts.users_id_users = ?
ORDER BY posts.data_criacao_post DESC";

?>

<main class="container-fluid my-lg-5">
    <section class="row sticky-top">
        <div class="col-12 text-center background">
            <a id="fechar" href="perfil.php" class="float-right pt-4 pr-4"><i class="fas fa-times fa-2x"></i></a>
            <p class="pt-5 pb-1 d-md-block d-none h">Os teus guardados</p>
            <p class="pt-5 pb-1 d-md-none h_pequeno">Os teus guardados</p>
        </div>
    </section>

    <section class="row my-4 justify-content-center ">
        <?php
        if (mysqli_stmt_prepare($stmt, $query)) {
            mysqli_stmt_bind_param($stmt, 'i', $USER_ID);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $id_users, $id_posts, $nome_user, $imagem_user, $user_post, $titulo_post, $conteudo_post, $imagem_post, $data_criacao_post, $nome_grupo);

        while (mysqli_stmt_fetch($stmt)) {
            ?>

        <article class="col-11 borda_post shadow mb-4">
            <div class="row mt-1">

                <div class="col-2 col-md-2 col-lg-1 my-auto">
                    <img src="uploads/<?= $imagem_user ?>"
                         class="img-fluid rounded-circle p-sm-1">
                </div>
                <div class="col-8 col-sm-8 position-relative">
                    <h4 class="pt-3"><?= $nome_user ?></h4>
                    <p>Tribo de <?= $nome_grupo ?> * <?= $data_criacao_post ?></p>
                </div>
                <div class="col-2 col-lg-3 text-right my-auto">
                    <div class="dropdown show">
                        <div class="btn-group dropleft">
                            <button type="button" class="btn btn-secondary dropdown-toggle"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#" data-target="#myModal3<?=$id_posts?>" data-toggle="modal">Remover</a>
                                <a class="dropdown-item" href="#" data-target="#myModal5" data-toggle="modal">Denunciar</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-2">
                    <p class="font-weight-bold pl-5"><?= $titulo_post ?></p>
                    <?php if ($imagem_post != null) {
                        echo "<img class='text-center' src='uploads/$imagem_post'>";
                    }
                    ?>
                    <p class="pl-5"><?= $conteudo_post ?></p>
                </div>

            </div>
        </article>

            <!-- REMOVER -->
            <!-- Button trigger modal -->
            <div class="modal show margemmodal" id="myModal3<?=$id_posts?>">

                <div class="modal-dialog modal-lg modal-dialog-centered">

                    <!-- CONTEÚDO DO MODAL ######################### -->
                    <div class="modal-content bg-white text-dark bordermodal">

                        <!-- CABEÇALHO DO MODAL ######################### -->
                        <div class="modal-header mx-auto">
                            <h3 class="text-center pt-3">Tem a certeza que deseja remover dos guardados?</h3>
                        </div>
                        <form method="get" class="text-center">
                            <div class="row justify-content-center mx-auto mt-4">
                                <a class="btnlogin w-25 text-decoration-none mx-3" href="scripts/sc_remover_guardados.php?post=<?= $id_posts; ?>">Remover</a>
                                <a class="btnlogin w-25 text-decoration-none mx-3" href="">Cancelar</a>
                            </div>
                        </form>
                        <!-- BOTÃO QUE FECHA O MODAL ######################### -->

                        <!-- CORPO DO MODAL ######################### -->
                        <div class="modal-body mx-auto text-center bgdark">
                        </div>
                        <!-- RODAPÉ DO MODAL ######################### -->
                        <div class="modal-footer">
                            <p class="small mx-auto">Hi-Tribe</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fim Modal -->
        <?php
        } mysqli_stmt_close($stmt);
        } mysqli_close($link);
        ?>
    </section>

    <!-- DENUNCIAR -->
    <!-- Button trigger modal -->
    <div class="modal show margemmodal" id="myModal5">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <!-- CONTEÚDO DO MODAL ######################### -->
            <div class="modal-content bg-white text-dark bordermodal">
                <!-- CABEÇALHO DO MODAL ######################### -->
                <div class="modal-header mx-auto">
                    <h3 class="text-center pt-3">Tem a certeza que deseja denunciar?</h3>
                </div>
                <form method="post" class="text-center">
                    <div class="row justify-content-center mx-auto mt-4">
                        <a class="btnlogin w-25 text-decoration-none mx-3" href="">Denunciar</a>
                        <a class="btnlogin w-25 text-decoration-none mx-3" href="">Cancelar</a>
                    </div>
                </form>
                <!-- BOTÃO QUE FECHA O MODAL ######################### -->

                <!-- CORPO DO MODAL ######################### -->
                <div class="modal-body mx-auto text-center bgdark">
                </div>
                <!-- RODAPÉ DO MODAL ######################### -->
                <div class="modal-footer">
                    <p class="small mx-auto">Hi-Tribe</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Fim Modal -->
</main>