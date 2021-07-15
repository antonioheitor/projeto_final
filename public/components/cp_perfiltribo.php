<?php
require_once "connections/connection.php";

if (isset($_GET["grupo"])) {
    $temas_id_temas = $_GET["grupo"];
}

$link = new_db_connection();

$stmt = mysqli_stmt_init($link);

$query = "SELECT id_grupo, nome_grupo, descricao_grupo, imagem_grupo, sedes_id_sede_grupo, nome_sede, temas_id_temas, nome_tema 
FROM grupo 
INNER JOIN sedes 
ON id_sede_grupo = sedes_id_sede_grupo 
INNER JOIN temas 
ON id_temas = temas_id_temas 
WHERE temas_id_temas = ?";


if (mysqli_stmt_prepare($stmt, $query)) {


    mysqli_stmt_bind_param($stmt, 'i', $temas_id_temas);

    if (mysqli_stmt_execute($stmt)) {

        mysqli_stmt_bind_result($stmt, $id_grupo, $nome_grupo, $descricao_grupo, $imagem_grupo, $sedes_id_sede_grupo,
            $nome_sede, $temas_id_temas, $nome_tema);



        $_SESSION["temas_id_temas"] = $temas_id_temas;
        echo $nome_grupo;

        if (!mysqli_stmt_fetch($stmt)) {
                header('Location: filtros.php');

        }

    } else {


    }
    //mostrar o codigo a apresentar
} else {

    echo "ERRORRRRR: " . mysqli_error($link);
}
mysqli_stmt_close($stmt);



?>





<main class="container-fluid background">
    <section class="row">
        <a href="filtros.php" class="m-3 esq mt-lg-5 pt-lg-5"><i class="fas fa-arrow-left fa-2x"></i></a>
        <a id="def" href="definicoestribo.php?tema_tribo=<?= $temas_id_temas ?>" class="m-3 dto mt-lg-5 pt-lg-5"><i class="fas fa-cog fa-2x"></i></a>
    </section>

    <section class="row justify-content-center align-items-stretch">
        <img src="../uploads/<?= $imagem_grupo ?>" alt="" class="w-100">
    </section>

    <section class="row justify-content-center mt-5">
        <p class="pt-5 pb-1 d-md-block d-none h">Tribo de <?= $nome_grupo ?></p>
        <p class="pt-5 pb-1 d-md-none h_pequeno text-center">Tribo de <?= $nome_grupo ?></p>
    </section>

    <section class="justify-content-center mt-5 row">
        <p class="col-11 text-center font-weight-bold"><?= $descricao_grupo ?></p>
    </section>

    <section class="justify-content-center mt-5 row">
        <div class="col-8">
            <div class="row borda_post shadow-sm text-center pt-3 pb-2">
                <h5 class="col-12 text-center"><b>Sede: </b><?= $nome_sede ?></h5>
            </div>
        </div>

    </section>

    <section class="row justify-content-center mt-5 pt-3 mb-5">

        <button class="btnlogin w-50 text-center col-5 col-md-4 col-lg-3" data-dismiss="modal" type="button"
                id="entrar">Entrar
        </button>

    </section>

    <span id="posts" class="mt-5">
        <?php
        $stmt = mysqli_stmt_init($link);
        $query = "SELECT posts.id_posts, posts.titulo_post, posts.conteudo_post, posts.imagem_post, posts.data_criacao_post, grupo.nome_grupo, grupo.id_grupo, users.nome_users, users.id_users, users.imagem_user FROM posts 
INNER JOIN grupo
ON grupo.id_grupo = posts.grupo_id_grupo
INNER JOIN users
ON users.id_users = posts.users_id_users
WHERE id_grupo = ?";

        /*$query = "SELECT id_posts, titulo_post, conteudo_post, imagem_post, data_criacao_post, users_id_users,
        nome_grupo, grupo_id_grupo FROM posts
INNER JOIN grupo
ON grupo_id_grupo = id_grupo
WHERE users_id_users = ?;";*/


        if (mysqli_stmt_prepare($stmt, $query)) {

        mysqli_stmt_bind_param($stmt, 'i', $id_grupo);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_bind_result($stmt, $id_posts, $titulo_post, $conteudo_post, $imagem_post, $data_criacao_post,
            $nome_grupo, $grupo_id_grupo, $nome_user,  $id_user, $imagem_user);

        while (mysqli_stmt_fetch($stmt)) { ?>
        <section class="row my-4 justify-content-center">
            <article class="col-11 borda_post shadow">
                <div class="row mt-1">
                    <div class="col-2 col-md-2 col-lg-1 my-auto">
                        <img src="../uploads/<?= $imagem_user; ?>" class="img-fluid rounded-circle p-sm-1">
                    </div>
                    <div class="col-8 col-sm-8 position-relative">
                        <h4 class="pt-3"><?= $nome_user; ?></h4>
                        <p>Tribo de <?= $nome_grupo; ?> * <?= $data_criacao_post; ?></p>
                    </div>
                    <div class="col-2 col-lg-3 text-right my-auto">
                        <div class="dropdown show">
                        <div class="btn-group dropleft">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false"></button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#" data-target="#myModal3"
                                   data-toggle="modal">Guardar</a>
                                <a class="dropdown-item" href="#" data-target="#myModal4" data-toggle="modal">Apagar</a>
                                <a class="dropdown-item" href="#" data-target="#myModal5"
                                   data-toggle="modal">Denunciar</a>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="pt-2">
                    <p><?= $titulo_post; ?></p>
                    <p><?= $conteudo_post; ?></p>
                      <?php if ($imagem_post != null) {
                          echo "<img class='text-center' src='$imagem_post'>";
                      }
                      ?>
                    <div class="float-right pb-2">
                                <i class="fas fa-plus-circle fa-2x" data-target="#comentario<?=$id_posts?>" data-toggle="modal"></i>
                            </div>
                        </div>

                </div>
                </article>

                <div class="modal show margemmodal" id="comentario<?=$id_posts?>">

                    <div class="modal-dialog modal-lg modal-dialog-centered">

                        <!-- CONTEÚDO DO MODAL ######################### -->
                        <div class="modal-content bg-white text-dark bordermodal">

                            <!-- CABEÇALHO DO MODAL ######################### -->
                            <div class="modal-header mx-auto">
                                <h3 class="text-center pt-3">Comenta</h3>
                                <button class="close ptt" data-dismiss="modal" type="button">&times;</button>
                            </div>
                            <form method="post">
                                <div class="modal-body text-center">
                                    <textarea class="w-50" name="descpost" type="text"></textarea>
                                </div>
                                <p class="text-center mt-4">Selecione imagem</p>
                                <input type="file" class="form-control w-50 mx-auto bg-light border-0" name="fileToUpload"
                                       id="customFile"/>
                                <div class="row justify-content-center">
                                    <button class="btnlogin w-50 text-center" data-dismiss="modal" type="submit">
                                        Submeter
                                    </button>
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
        </section>
        <?php }
            mysqli_stmt_close($stmt);
        }
        mysqli_close($link);


        ?>



    </span>

    <!-- COMENTÁRIOS -->
    <!-- Button trigger modal -->
    <div class="modal show margemmodal" id="myModal2">

        <div class="modal-dialog modal-lg modal-dialog-centered">

            <!-- CONTEÚDO DO MODAL ######################### -->
            <div class="modal-content bg-white text-dark bordermodal">

                <!-- CABEÇALHO DO MODAL ######################### -->
                <div class="modal-header mx-auto">
                    <h3 class="text-center pt-3">Comenta</h3>
                    <button class="close ptt" data-dismiss="modal" type="button">&times;</button>
                </div>
                <form method="post">
                    <div class="modal-body text-center">
                        <textarea class="w-50" name="descpost" type="text"></textarea>
                    </div>
                    <div class="row justify-content-center">
                        <button class="btnlogin w-50 text-center" data-dismiss="modal" type="button">
                            Submeter
                        </button>
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

    <!-- GUARDAR -->
    <!-- Button trigger modal -->
    <div class="modal show margemmodal" id="myModal3">

        <div class="modal-dialog modal-lg modal-dialog-centered">

            <!-- CONTEÚDO DO MODAL ######################### -->
            <div class="modal-content bg-white text-dark bordermodal">

                <!-- CABEÇALHO DO MODAL ######################### -->
                <div class="modal-header mx-auto">
                    <h3 class="text-center pt-3">Tem a certeza que deseja guardar?</h3>
                    <button class="close ptt" data-dismiss="modal" type="button">&times;</button>
                </div>
                <form method="post" class="text-center">
                    <div class="row justify-content-center mx-auto mt-4">
                        <button class="btnlogin w-25 text-center mr-3" data-dismiss="modal" type="button">Sim</button>
                        <button class="btnlogin w-25 text-center ml-3" data-dismiss="modal" type="button">Não</button>
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

    <!-- APAGAR POST -->
    <!-- Button trigger modal -->
    <div class="modal show margemmodal" id="myModal4">

        <div class="modal-dialog modal-lg modal-dialog-centered">

            <!-- CONTEÚDO DO MODAL ######################### -->
            <div class="modal-content bg-white text-dark bordermodal">

                <!-- CABEÇALHO DO MODAL ######################### -->
                <div class="modal-header mx-auto">
                    <h3 class="text-center pt-3">Tem a certeza que deseja apagar?</h3>
                    <button class="close ptt" data-dismiss="modal" type="button">&times;</button>
                </div>
                <form method="post" class="text-center">
                    <div class="row justify-content-center mx-auto mt-4">
                        <button class="btnlogin w-25 text-center mr-3" data-dismiss="modal" type="button">Sim</button>
                        <button class="btnlogin w-25 text-center ml-3" data-dismiss="modal" type="button">Não</button>
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

    <!-- DENUNCIAR -->
    <!-- Button trigger modal -->
    <div class="modal show margemmodal" id="myModal5">

        <div class="modal-dialog modal-lg modal-dialog-centered">

            <!-- CONTEÚDO DO MODAL ######################### -->
            <div class="modal-content bg-white text-dark bordermodal">

                <!-- CABEÇALHO DO MODAL ######################### -->
                <div class="modal-header mx-auto">
                    <h3 class="text-center pt-3">Tem a certeza que deseja denunciar?</h3>
                    <button class="close ptt" data-dismiss="modal" type="button">&times;</button>
                </div>
                <form method="post" class="text-center">
                    <div class="row justify-content-center mx-auto mt-4">
                        <button class="btnlogin w-25 text-center mr-3" data-dismiss="modal" type="button">Sim</button>
                        <button class="btnlogin w-25 text-center ml-3" data-dismiss="modal" type="button">Não</button>
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