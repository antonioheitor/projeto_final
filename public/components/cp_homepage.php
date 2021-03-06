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

?>


<main class="container-fluid">

    <?php

    $check = FALSE;

    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);

    $query = "SELECT users_has_grupo.users_id_users, users_has_grupo.grupo_id_grupo FROM users_has_grupo
WHERE users_has_grupo.users_id_users = ?";

    if (mysqli_stmt_prepare($stmt, $query)) {

        mysqli_stmt_bind_param($stmt, 'i', $USER_ID);

        if (mysqli_stmt_execute($stmt)) {

            while (mysqli_stmt_fetch($stmt)) {
                $check = TRUE;
            };
            //mostrar o codigo a apresentar
        } else {
            echo "ERRORRRRR: " . mysqli_error($link);
        }
        mysqli_stmt_close($stmt);
    }
    if ($check == TRUE) {
        ?>
        <section class="row justify-content-center mt-lg-4 pt-3" data-target="#myModal" data-toggle="modal">
            <div class="col-11 shadow-sm borda_post rounded-pill mt-lg-5 py-3">
                <h8 class="text-secondary">Escreve algo...</h8>
            </div>
        </section>
    <?php
    }
    ?>

    <section id="homepagealerta">
        <div class="container">
            <h2 class="text-center"></h2>
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <?php
                    if (isset($_GET["msg"])) {
                        $msg_show = true;
                        switch ($_GET["msg"]) {
                            case 0:
                                $message = "Erro ao apagar post.";
                                $class="alert-danger";
                                break;
                            case 1:
                                $message = "Post apagado com sucesso!";
                                $class="alert-success";
                                break;
                            case 2:
                                $message = "Post criado com sucesso!";
                                $class="alert-success";
                                break;
                            case 3:
                                $message = "Erro na cria????o do post.";
                                $class="alert-danger";
                                break;
                            case 4:
                                $message = "Post guardado com sucesso!";
                                $class="alert-success";
                                break;
                            case 5:
                                $message = "Erro em guardar post :/";
                                $class="alert-danger";
                                break;
                            case 6:
                                $message = "Coment??rio eliminado com sucesso!";
                                $class="alert-success";
                                break;
                            case 7:
                                $message = "Erro em eliminar coment??rio :/";
                                $class="alert-danger";
                                break;
                            case 8:
                                $message = "Coment??rio feito com sucesso!";
                                $class="alert-success";
                                break;
                            case 9:
                                $message = "Erro em fazer coment??rio :/";
                                $class="alert-danger";
                                break;
                            default:
                                $msg_show = false;
                        }

                        echo "<div class=\"alert $class alert-dismissible fade show\" role=\"alert\">
" . $message . "
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
    <span aria-hidden=\"true\">&times;</span>
  </button>
</div>";
                        if ($msg_show) {
                            echo '<script>window.onload=function (){$(\'.alert\').alert();}</script>';
                        }
                    }
                    ?>
                </div>
            </div>

        </div>
    </section>

    <!-- POSTS -->
    <!-- Button trigger modal -->
    <div class="modal show margemmodal" id="myModal">

        <div class="modal-dialog modal-lg modal-dialog-centered">

            <!-- CONTE??DO DO MODAL ######################### -->
            <div class="modal-content bg-white text-dark bordermodal">
                <div class="modal-header mx-auto">
                    <h3 class="text-center pt-3">O teu post</h3>
                    <button class="close ptt" data-dismiss="modal" type="button">&times;</button>
                </div>

                <!-- CABE??ALHO DO MODAL ######################### -->
                <form method="post" role="form" id="post-form" action="scripts/sc_new_post.php"
                      enctype="multipart/form-data">
                    <div class="text-center">
                        <label class="ml-3 mt-3 text-center">Titulo da publica????o</label>
                    </div>
                    <input class="w-50 mx-auto" name="titulopost" type="text">
                    <div class="modal-body text-center">
                        <p class="text-center">Escreve o post :)</p>
                        <textarea class="w-50 mx-auto" name="descpost" type="text"></textarea>
                        <p class="text-center mt-4">Selecione imagem</p>
                        <input type="file" class="form-control w-50 mx-auto bg-light border-0" name="fileToUpload"
                               id="customFile"/>
                        <div class="dropdown text-center mt-4">
                            <label>Escolhe a tua tribo</label>
                            <select class="form-control" name="grupo_id_grupo">
                                <?php

                                $stmt1 = mysqli_stmt_init($link);

                                $query1 = "SELECT grupo_id_grupo, id_grupo, nome_grupo FROM users_has_grupo 
                                        INNER JOIN grupo
                                        ON grupo_id_grupo = id_grupo 
                                        WHERE users_id_users = ?";

                                if (mysqli_stmt_prepare($stmt1, $query1)) {

                                    mysqli_stmt_bind_param($stmt1, 'i', $_SESSION['id']);
                                    mysqli_stmt_execute($stmt1);
                                    mysqli_stmt_bind_result($stmt1, $grupo_id_grupo, $id_grupo, $nome_grupo);

                                    while (mysqli_stmt_fetch($stmt1)) {
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

                                mysqli_stmt_close($stmt1);

                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <button class="btnlogin w-50 text-center col-4" type="submit">Submeter Dados</button>
                    </div>
                </form>
                <!-- CORPO DO MODAL ######################### -->
                <div class="modal-body mx-auto text-center bgdark">
                </div>
                <!-- RODAP?? DO MODAL ######################### -->
                <div class="modal-footer">
                    <p class="small mx-auto">Hi-Tribe</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Fim Modal -->


    <section>
        <?php
        $stmt2 = mysqli_stmt_init($link);

        $query2 = "SELECT posts.id_post, posts.titulo_post, posts.conteudo_post, posts.imagem_post, posts.data_criacao_post, grupo.nome_grupo, users_has_grupo.users_id_users, users_has_grupo.grupo_id_grupo, users.id_users, users.imagem_user, users.nome_users
FROM users_has_grupo
INNER JOIN grupo
ON grupo.id_grupo = users_has_grupo.grupo_id_grupo
INNER JOIN posts
ON grupo.id_grupo = posts.grupo_id_grupo
INNER JOIN users
ON posts.users_id_users = users.id_users
WHERE users_has_grupo.users_id_users = ?
ORDER BY posts.id_post DESC";

        if (mysqli_stmt_prepare($stmt2, $query2)) {

        mysqli_stmt_bind_param($stmt2, 'i', $USER_ID);

        mysqli_stmt_execute($stmt2);

        mysqli_stmt_bind_result($stmt2, $id_posts, $titulo_post, $conteudo_post, $imagem_post, $data_criacao_post, $nome_grupo, $users_id_users, $id_grupo, $iduser, $imagem_user, $nome_user);

        } else {
            echo "ERRORRRRR: " . mysqli_error($link);
        }

        mysqli_stmt_store_result($stmt2);
        while (mysqli_stmt_fetch($stmt2))

        { ?>
            <section class="row my-4 justify-content-center">
                <article class="col-11 borda_post shadow">
                    <div class="row mt-1">
                        <div class="col-2 col-md-2 col-lg-1 my-auto">
                            <img src="uploads/<?= $imagem_user; ?>" class="img-fluid rounded-circle p-sm-1">
                        </div>
                        <div class="col-8 col-sm-8 position-relative">
                            <h4 class="pt-3"><?= $nome_user; ?></h4>
                            <p><a href="perfil_tribo.php?grupo=<?=$id_grupo?>">Tribo de <?= $nome_grupo; ?></a> * <?=
                                $data_criacao_post; ?></p>
                        </div>
                        <div class="col-2 col-lg-3 text-right my-auto">
                            <div class="dropdown show">

                                <div class="btn-group dropleft">
                                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="#" data-target="#myModal3<?=$id_posts?>" data-toggle="modal">Guardar</a>
                                        <?php

                                        if ($USER_ID == $iduser) {
                                            ?>

                                            <a class="dropdown-item" href="#" data-target="#myModal4<?=$id_posts?>" data-toggle="modal">Apagar</a>
                                            <?php
                                        }
                                        ?>
                                        <a class="dropdown-item" href="#" data-target="#myModal5"
                                           data-toggle="modal">Denunciar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pt-2">
                        <p class="font-weight-bold pl-5"><?= $titulo_post ?></p>
                        <p class="pl-5"><?= $conteudo_post ?></p>

                        <?php
                       if (($imagem_post != null) ) {
                            ?>
                            <img class="text-center img-fluid" src="uploads/<?= $imagem_post ?>"
                            <?php
                       }
                        ?>

                    </div>
                    <div class="text-right py-2 col-12">
                        <i class="fas fa-plus-circle fa-2x" data-target="#comentario<?=$id_posts?>" data-toggle="modal"></i>
                    </div>

              <?php
                    $stmt = mysqli_stmt_init($link);
                    $query = "SELECT id_comentario, texto_comentario, imagem_comentario, users_id_users, nome_users, post_id_post
                    FROM comentarios INNER JOIN users
                    ON users_id_users = id_users WHERE post_id_post = ?";



                    if (mysqli_stmt_prepare($stmt, $query)) {
                    mysqli_stmt_bind_param($stmt, "i", $id_posts);

                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_bind_result($stmt, $id_comentario, $texto_comentario, $imagem_comentario, $users_id_users, $nomee_comentario, $id_posts);
                    } else {
                    echo "ERRORRRRR: " . mysqli_error($link);
                    }


                    while (mysqli_stmt_fetch($stmt)) {


                    ?>
                        <div class='row border-top'>
                            <div class='pt-2 col-11'>
                                <div class='row justify-content-end ml-2'>
                                    <div class='col-2 col-sm-1 pr-0'>
                                        <i class='fas fa-reply fa-rotate-180 fa-2x'></i>
                                    </div>
                                    <div class='col-10 col-sm-11 pl-0'>
                                        <h6 class='col-10 mt-2'><?=$nomee_comentario?></h6>
                                    </div>
                                </div>
                                <p class='ml-3 mt-2 ml-5'><?=$texto_comentario?>
                                </p>
                                <?php
                                if (($imagem_comentario != null) ) {
                                    ?>
                                    <img class="text-center img-fluid" src="uploads/<?=$imagem_comentario?>"
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="text-right my-auto">
                                <div class="dropdown show">

                                    <div class="btn-group dropleft">
                                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <?php
                                            if ($USER_ID == $users_id_users) {
                                            ?>
                                                <a class="dropdown-item" href="#" data-target="#myModal6<?=$id_comentario?>" data-toggle="modal">Apagar</a>
                                            <?php
                                            }
                                            ?>
                                            <a class="dropdown-item" href="#" data-target="#myModal5" data-toggle="modal">Denunciar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- APAGAR COMENT??RIO -->
                        <!-- Button trigger modal -->
                        <div class="modal show margemmodal" id="myModal6<?=$id_comentario?>">

                            <div class="modal-dialog modal-lg modal-dialog-centered">

                                <!-- CONTE??DO DO MODAL ######################### -->
                                <div class="modal-content bg-white text-dark bordermodal">

                                    <!-- CABE??ALHO DO MODAL ######################### -->
                                    <div class="modal-header mx-auto">
                                        <h3 class="text-center pt-3">Tem a certeza que deseja apagar?</h3>
                                    </div>
                                    <form method="get" class="text-center" role="form">
                                        <div class="row justify-content-center mx-auto mt-4">
                                            <a class="btnlogin w-25 text-decoration-none mx-3" href="scripts/sc_apagar_comentario.php?comentario=<?= $id_comentario?>">Apagar</a>
                                            <a class="btnlogin w-25 text-decoration-none mx-3" href="">Cancelar</a>
                                        </div>
                                    </form>
                                    <!-- BOT??O QUE FECHA O MODAL ######################### -->

                                    <!-- CORPO DO MODAL ######################### -->
                                    <div class="modal-body mx-auto text-center bgdark">
                                    </div>
                                    <!-- RODAP?? DO MODAL ######################### -->
                                    <div class="modal-footer">
                                        <p class="small mx-auto">Hi-Tribe</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Fim Modal -->
                    <?php
                    }
                    mysqli_stmt_close($stmt);
                    ?>
                </article>
            </section>

            <div class="modal show margemmodal" id="comentario<?=$id_posts?>">

                <div class="modal-dialog modal-lg modal-dialog-centered">

                    <!-- CONTE??DO DO MODAL ######################### -->
                    <div class="modal-content bg-white text-dark bordermodal">

                        <!-- CABE??ALHO DO MODAL ######################### -->
                        <div class="modal-header mx-auto">
                            <h3 class="text-center pt-3">Comenta</h3>
                            <button class="close ptt" data-dismiss="modal" type="button">&times;</button>
                        </div>
                        <form method="post" role="form" id="post-form2" enctype="multipart/form-data" action="scripts/sc_new_comment.php?post=<?= $id_posts?>">
                            <div class="modal-body text-center">
                                <textarea class="w-50" name="descpost" type="text"></textarea>
                            </div>
                            <p class="text-center mt-1">Selecione imagem</p>
                            <input type="file" class="form-control w-50 mx-auto bg-light border-0" name="fileToUpload"
                                   id="customFile"/>
                            <div class="row justify-content-center mt-4">
                                <button class="btnlogin w-50 text-center" type="submit">Submeter</button>
                            </div>
                        </form>
                        <!-- BOT??O QUE FECHA O MODAL ######################### -->

                        <!-- CORPO DO MODAL ######################### -->
                        <div class="modal-body mx-auto text-center bgdark">
                        </div>
                        <!-- RODAP?? DO MODAL ######################### -->
                        <div class="modal-footer">
                            <p class="small mx-auto">Hi-Tribe</p>
                        </div>

                    </div>

                </div>

            </div>

            <!-- GUARDAR -->
            <!-- Button trigger modal -->
            <div class="modal show margemmodal" id="myModal3<?=$id_posts?>">

                <div class="modal-dialog modal-lg modal-dialog-centered">

                    <!-- CONTE??DO DO MODAL ######################### -->
                    <div class="modal-content bg-white text-dark bordermodal">

                        <!-- CABE??ALHO DO MODAL ######################### -->
                        <div class="modal-header mx-auto">
                            <h3 class="text-center pt-3">Tem a certeza que deseja guardar?</h3>
                        </div>

                        <form method="get" class="text-center" role="form">
                            <div class="row justify-content-center mx-auto mt-4">
                                <a class="btnlogin w-25 text-decoration-none mx-3" href="scripts/sc_guardados.php?post=<?= $id_posts; ?>">Guardar</a>
                                <a class="btnlogin w-25 text-decoration-none mx-3" href="">Cancelar</a>
                            </div>
                        </form>
                        <!-- BOT??O QUE FECHA O MODAL ######################### -->

                        <!-- CORPO DO MODAL ######################### -->
                        <div class="modal-body mx-auto text-center bgdark">
                        </div>
                        <!-- RODAP?? DO MODAL ######################### -->
                        <div class="modal-footer">
                            <p class="small mx-auto">Hi-Tribe</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fim Modal -->

            <!-- APAGAR POST -->
            <!-- Button trigger modal -->
            <div class="modal show margemmodal" id="myModal4<?=$id_posts?>">

                <div class="modal-dialog modal-lg modal-dialog-centered">

                    <!-- CONTE??DO DO MODAL ######################### -->
                    <div class="modal-content bg-white text-dark bordermodal">

                        <!-- CABE??ALHO DO MODAL ######################### -->
                        <div class="modal-header mx-auto">
                            <h3 class="text-center pt-3">Tem a certeza que deseja apagar?</h3>
                        </div>
                        <form method="get" class="text-center" role="form">
                            <div class="row justify-content-center mx-auto mt-4">
                                <a class="btnlogin w-25 text-decoration-none mx-3" href="scripts/sc_deletepost.php?post=<?= $id_posts?>">Apagar</a>
                                <a class="btnlogin w-25 text-decoration-none mx-3" href="">Cancelar</a>
                            </div>
                        </form>
                        <!-- BOT??O QUE FECHA O MODAL ######################### -->

                        <!-- CORPO DO MODAL ######################### -->
                        <div class="modal-body mx-auto text-center bgdark">
                        </div>
                        <!-- RODAP?? DO MODAL ######################### -->
                        <div class="modal-footer">
                            <p class="small mx-auto">Hi-Tribe</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fim Modal -->

        <?php }

        mysqli_stmt_close($stmt2);

        ?>
    </section>
<?php



    mysqli_close($link);
    ?>


    <!-- DENUNCIAR -->
    <!-- Button trigger modal -->
    <div class="modal show margemmodal" id="myModal5">

        <div class="modal-dialog modal-lg modal-dialog-centered">

            <!-- CONTE??DO DO MODAL ######################### -->
            <div class="modal-content bg-white text-dark bordermodal">

                <!-- CABE??ALHO DO MODAL ######################### -->
                <div class="modal-header mx-auto">
                    <h3 class="text-center pt-3">Tem a certeza que deseja denunciar?</h3>
                </div>
                <form method="get" class="text-center" role="form">
                    <div class="row justify-content-center mx-auto mt-4">
                        <a class="btnlogin w-25 text-decoration-none mx-3" href="#">Denunciar</a>
                        <a class="btnlogin w-25 text-decoration-none mx-3" href="">Cancelar</a>
                    </div>
                </form>
                <!-- BOT??O QUE FECHA O MODAL ######################### -->

                <!-- CORPO DO MODAL ######################### -->
                <div class="modal-body mx-auto text-center bgdark">
                </div>
                <!-- RODAP?? DO MODAL ######################### -->
                <div class="modal-footer">
                    <p class="small mx-auto">Hi-Tribe</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Fim Modal -->
</main>


