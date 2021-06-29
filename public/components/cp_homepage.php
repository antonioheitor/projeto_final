<?php
session_start();

if (isset($_SESSION["nome"])) {
    $USER_NAME = $_SESSION["nome"];

}

if (isset($_SESSION["id"])) {
    $USER_ID = $_SESSION["id"];

}

if (isset($_SESSION["role"])) {
    $USER_ROLE = $_SESSION["role"];

}



?>



<main class="container-fluid mt-lg-5 pt-2">
    <section class="row justify-content-center mt-lg-4 pt-3" data-target="#myModal" data-toggle="modal">
        <div class="col-11 shadow-sm borda_post rounded-pill py-3">
            <h8 class="text-secondary">Escreve algo...</h8>
        </div>
    </section>

    <!-- POSTS -->
    <!-- Button trigger modal -->
    <div class="modal show margemmodal" id="myModal">

        <div class="modal-dialog modal-lg modal-dialog-centered">

            <!-- CONTEÚDO DO MODAL ######################### -->
            <div class="modal-content bg-white text-dark bordermodal">
                <div class="modal-header mx-auto">
                    <h3 class="text-center pt-3">O teu post</h3>
                    <button class="close ptt" data-dismiss="modal" type="button">&times;</button>
                </div>

                <!-- CABEÇALHO DO MODAL ######################### -->
                <form method="post" role="form" id="post-form" action="scripts/sc_new_post.php" enctype="multipart/form-data">
                    <div class="text-center">
                    <label class="ml-3 mt-3 text-center">Titulo da publicação</label>
                    </div>
                    <input class="w-50 mx-auto" name="titulopost" type="text">
                    <div class="modal-body text-center">
                        <label class="text-center">Escreve o post :)</label>
                        <input class="w-50 mx-auto" name="descpost" type="text">
                        <p class="text-center mt-4">Selecione imagem</p>
                        <input type="file" class="form-control w-50 mx-auto bg-light border-0" name="fileToUpload" id="customFile"/>
                        <div class="dropdown text-center mt-4">
                            <label>Escolhe a tua tribo</label>
                            <select class="form-control" name="grupo_id_grupo">
                                <?php
                                require_once "connections/connection.php";




                                $link = new_db_connection();

                                $stmt = mysqli_stmt_init($link);


                                $query = "SELECT grupo_id_grupo, id_grupo, nome_grupo FROM users_has_grupo 
INNER JOIN grupo
ON grupo_id_grupo = id_grupo 
WHERE users_id_users = ?;";


                                if (mysqli_stmt_prepare($stmt, $query)) {

                                    mysqli_stmt_bind_param($stmt, 'i', $USER_ID);

                                    mysqli_stmt_execute($stmt);

                                    mysqli_stmt_bind_result($stmt, $grupo_id_grupo, $id_grupo, $nome_grupo);


                                    while (mysqli_stmt_fetch($stmt)) {
                                        $selected1 = "";
                                        if ($grupo_id_grupo == $id_grupo) {
                                            $selected1 = "selected";
                                        }

                                        echo "<option value='$id_grupo' $selected1>$nome_grupo</option>";
                                    }


                                } else {

                                    echo "ERRORRRRR: " . mysqli_error($link);
                                }
                                //close connection

                                mysqli_stmt_close($stmt);



                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <button class="btnlogin w-50 text-center col-4"type="submit">
                            Submeter Dados
                        </button>
                    </div>
                </form>
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

    <section class="row my-4 justify-content-center">
        <?php
        $stmt = mysqli_stmt_init($link);
        $query = "SELECT id_posts, titulo_post, conteudo_post, imagem_post, data_criacao_post, users_id_users, nome_grupo, grupo_id_grupo FROM posts 
INNER JOIN grupo
ON grupo_id_grupo = id_grupo
WHERE users_id_users = ?;";


        if (mysqli_stmt_prepare($stmt, $query)) {

        mysqli_stmt_bind_param($stmt, 'i', $USER_ID);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_bind_result($stmt, $id_posts, $titulo_post, $conteudo_post, $imagem_post, $data_criacao_post, $users_id_users, $nome_grupo, $grupo_id_grupo );

        while (mysqli_stmt_fetch($stmt)) { ?>
        <article class="col-11 borda_post shadow mb-4">
            <div class="row mt-1">


                <div class="col-2 col-md-2 col-lg-1 my-auto">
                    <img src="../uploads/<?= $imagem_post ?>" class="img-fluid rounded-circle p-sm-1 border border-success">
                </div>
                <div class="col-8 col-sm-8 position-relative">
                    <h4 class="pt-3"><?= $USER_NAME ?></h4>
                    <p>Tribo de <?= $nome_grupo ?> * <?= $data_criacao_post ?></p>
                </div>
                <div class="col-2 col-lg-3 text-right my-auto">
                    <div class="dropdown show">
                        <div class="btn-group dropleft">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#" data-target="#myModal3" data-toggle="modal">Guardar</a>
                                <a class="dropdown-item" href="#" data-target="#myModal4" data-toggle="modal">Apagar</a>
                                <a class="dropdown-item" href="#" data-target="#myModal5" data-toggle="modal">Denunciar</a>
                            </div>
                        </div>
                    </div>
                </div>

            <div class="pt-2">
                <p class="font-weight-bold pl-5"><?= $titulo_post ?></p>
                <img class="text-center" src="<?= $imagem_post ?>">
                <p class="pl-5"><?= $conteudo_post ?></p>
                <div class="float-right pb-2">
                    <i class="fas fa-plus-circle fa-2x" data-target="#myModal2" data-toggle="modal"></i>
                </div>
            </div>

            </div>
        </article>
        <?php }
                    mysqli_stmt_close($stmt);
                }
                mysqli_close($link);


                ?>
    </section>



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