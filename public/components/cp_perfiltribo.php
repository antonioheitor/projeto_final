<?php
require_once "connections/connection.php";

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
}

if (isset($_GET["grupo"])) {
    $id_grupo = $_GET["grupo"];
}
$check = FALSE;

$link = new_db_connection();
$stmt = mysqli_stmt_init($link);

$query = "SELECT users_has_grupo.users_id_users, users_has_grupo.grupo_id_grupo FROM users_has_grupo
WHERE users_has_grupo.users_id_users = ? AND users_has_grupo.grupo_id_grupo = ?";

if (mysqli_stmt_prepare($stmt, $query)) {

    mysqli_stmt_bind_param($stmt, 'ii', $id, $id_grupo);

    if (mysqli_stmt_execute($stmt)) {

        mysqli_stmt_bind_result($stmt, $id, $id_grupo);

        while (mysqli_stmt_fetch($stmt)) {
            $check = TRUE;
        };
        //mostrar o codigo a apresentar
    } else {
        echo "ERRORRRRR: " . mysqli_error($link);
    }
    mysqli_stmt_close($stmt);
}



$stmt = mysqli_stmt_init($link);
$query = "SELECT id_grupo, nome_grupo, descricao_grupo, imagem_grupo, sedes_id_sede_grupo
FROM grupo
WHERE id_grupo = ?";


if (mysqli_stmt_prepare($stmt, $query)) {

    mysqli_stmt_bind_param($stmt, 'i', $id_grupo);

    if (mysqli_stmt_execute($stmt)) {

        mysqli_stmt_bind_result($stmt, $id_grupo, $nome_grupo, $descricao_grupo, $imagem_grupo, $sedes_id_sede_grupo);

        while (mysqli_stmt_fetch($stmt)) {
        };
        //mostrar o codigo a apresentar
    } else {
        echo "ERRORRRRR: " . mysqli_error($link);
    }
    mysqli_stmt_close($stmt);
}


?>

<main class="container-fluid background">
    <section class="row">
        <a href="filtros.php" class="m-3 esq mt-lg-5"><i class="fas fa-arrow-left fa-2x mt-lg-5"></i></a>
        <?php
        if ($check == TRUE) {
            ?>
            <a id="def" href="definicoestribo.php?grupo=<?= $id_grupo ?>" class="m-3 dto mt-lg-5"><i
                        class="fas fa-cog fa-2x mt-lg-5"></i></a>
        <?php
        }

        ?>

    </section>
    <section class="row justify-content-center align-items-stretch">
        <img src="uploads/<?= $imagem_grupo ?>" class="img-fluid" alt="">
    </section>

    <section class="row justify-content-center mt-2">
        <p class="pt-5 pb-1 d-md-block d-none h text-center">Tribo de <?= $nome_grupo ?></p>
        <p class="pt-5 pb-1 d-md-none h_pequeno text-center">Tribo de <?= $nome_grupo ?></p>
    </section>

    <section class="justify-content-center mt-2 row">
        <p class="col-11 text-center font-weight-bold"><?= $descricao_grupo ?></p>
    </section>


    <?php
    if (isset($sedes_id_sede_grupo)) {

        $stmt = mysqli_stmt_init($link);

        $query = "SELECT sedes.id_sede_grupo, sedes.nome_sede, grupo.id_grupo FROM sedes
INNER JOIN grupo
ON sedes.id_sede_grupo = grupo.sedes_id_sede_grupo
WHERE grupo.id_grupo = ?";


        if (mysqli_stmt_prepare($stmt, $query)) {

            mysqli_stmt_bind_param($stmt, 'i', $id_grupo);

            if (mysqli_stmt_execute($stmt)) {

                mysqli_stmt_bind_result($stmt, $sedes_id_sede_grupo, $nome_sede, $id_grupo);

                while (mysqli_stmt_fetch($stmt)) {
                };
                //mostrar o codigo a apresentar
            } else {
                echo "ERRORRRRR: " . mysqli_error($link);
            }
            mysqli_stmt_close($stmt);
        }

        ?>
        <section class="justify-content-center mt-2 row">
            <div class="col-8">
                <div class="row borda_post shadow-sm text-center pt-3 pb-2">
                    <h5 class="col-12 text-center"><b>Sede:</b> <?= $nome_sede ?></h5>
                </div>
            </div>
        </section>
        <?php
    }

    if ($check == FALSE) {
        ?>

        <section class="row justify-content-center mt-3 pt-3 mb-5">
            <form method="post" class="w-50 text-center" role="form" id="register-form" action="scripts/sc_entrar_tribo.php?grupo=<?= $id_grupo ?>" enctype="multipart/form-data">
                <button class="btnlogin text-center col-5 col-md-4 col-lg-3" data-dismiss="modal" type="submit"
                        id="entrar">Entrar
                </button>
            </form>
        </section>

    <?php
    }

    if ($check == TRUE) {

        ?>

    <span>
        <?php


        $stmt = mysqli_stmt_init($link);
        $query = "SELECT users.id_users, users.nome_users, users.imagem_user, roles_grupos_id_roles, grupo.id_grupo, grupo.nome_grupo, posts.id_posts, posts.titulo_post, posts.conteudo_post, posts.imagem_post, posts.data_criacao_post FROM users_has_grupo 
INNER JOIN users
ON users.id_users = users_has_grupo.users_id_users 
INNER JOIN grupo 
ON grupo.id_grupo = users_has_grupo.grupo_id_grupo 
INNER JOIN roles_grupos 
ON roles_grupos.id_roles = users_has_grupo.roles_grupos_id_roles
INNER JOIN posts
ON posts.grupo_id_grupo = users_has_grupo.grupo_id_grupo AND posts.users_id_users = users.id_users
WHERE grupo.id_grupo = ?
ORDER BY posts.id_posts DESC";

        if (mysqli_stmt_prepare($stmt, $query)) {

            mysqli_stmt_bind_param($stmt, 'i', $id_grupo);
            mysqli_stmt_execute($stmt);

            mysqli_stmt_bind_result($stmt, $id_user, $nome_user, $imagem_user, $roles, $id_grupo, $nome_grupo, $id_posts, $titulo_post, $conteudo_post, $imagem_post, $data_criacao_post);

            mysqli_stmt_store_result($stmt);
            while (mysqli_stmt_fetch($stmt)) {

                ?>
                <section class="row my-4 justify-content-center">
                <article class="col-11 borda_post shadow">
                    <div class="row mt-1">
                        <div class="col-2 col-md-2 col-lg-1 my-auto">
                            <?php
                            switch ($roles) {
                                case 1:
                                    echo "<img src='uploads/$imagem_user' class='img-fluid rounded-circle p-sm-1 border border-success'>";
                                    break;
                                case 3:
                                    echo "<img src='uploads/$imagem_user' class='img-fluid rounded-circle p-sm-1 border border-danger'>";
                                    break;
                                case 4:
                                    echo "<img src='uploads/$imagem_user' class='img-fluid rounded-circle p-sm-1 border border-warning'>";
                                    break;
                                case 6:
                                    echo "<img src='uploads/$imagem_user' class='img-fluid rounded-circle p-sm-1'>";
                                    break;
                            }
                            /*Aqui quando formos por os dados da BD direitos, temos de ter cuidado com os cases porque provavelmente os números vão mudar*/

                            ?>
                            <!-- <img src="uploads/$imagem_user;" class="img-fluid rounded-circle p-sm-1"> -->
                        </div>
                        <div class="col-8 col-sm-8 position-relative">
                            <h4 class="pt-3"><?= $nome_user; ?></h4>
                            <p>Tribo de <?= $nome_grupo; ?> * <?= $data_criacao_post; ?></p>
                        </div>
                        <div class="col-2 col-lg-3 text-right my-auto">
                            <div class="dropdown show">
                                <div class="btn-group dropleft">
                                    <button type="button" class="btn btn-secondary dropdown-toggle"
                                            data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false"></button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="#" data-target="#myModal3<?=$id_posts?>"
                                           data-toggle="modal">Guardar</a>
                                        <?php

                                        if ($id_user == $id) {
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
                        if ($imagem_post != null) {
                            ?>
                            <img class="text-center img-fluid" src="uploads/<?= $imagem_post ?>"
                            <?php
                        }
                        ?>

                    </div>
                    <div class="text-right py-2 col-12">
                        <i class="fas fa-plus-circle fa-2x" data-target="#comentario<?=$id_posts?>" data-toggle="modal"></i>
                    </div>

                     <?php      $stmt1 = mysqli_stmt_init($link);

                     $query1 = "SELECT id_comentario, texto_comentario, imagem_comentario, users_id_users, nome_users, post_id_post
                    FROM comentarios INNER JOIN users
                    ON users_id_users = id_users WHERE post_id_post = ?";



                     if (mysqli_stmt_prepare($stmt1, $query1)) {
                         mysqli_stmt_bind_param($stmt1, "i", $id_posts);

                         mysqli_stmt_execute($stmt1);
                         mysqli_stmt_bind_result($stmt1, $id_comentario, $texto_comentario, $imagem_comentario, $users_id_users, $nomee_comentario, $id_posts );
                     } else {
                         echo "ERRORRRRR: " . mysqli_error($link);
                     }


                     while (mysqli_stmt_fetch($stmt1)) {


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
                                <p class='ml-3 mt-2'><?=$texto_comentario?>
                                </p>
                            </div>
                             <div class="col-2 col-lg-3 text-right my-auto">
                                <div class="dropdown show">

                                    <div class="btn-group dropleft">
                                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <?php
                                            if ($id == $users_id_users) {
                                                ?>
                                                <a class="dropdown-item" href="#" data-target="#myModal6<?=$id_comentario?>" data-toggle="modal">Apagar</a>
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
                         <?php
                     }
                     mysqli_stmt_close($stmt1); ?>
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

                <div class="modal show margemmodal" id="comentario<?=$id_posts?>">

                <div class="modal-dialog modal-lg modal-dialog-centered">

                    <!-- CONTEÚDO DO MODAL ######################### -->
                    <div class="modal-content bg-white text-dark bordermodal">

                        <!-- CABEÇALHO DO MODAL ######################### -->
                        <div class="modal-header mx-auto">
                            <h3 class="text-center pt-3">Comenta</h3>
                            <button class="close ptt" data-dismiss="modal" type="button">&times;</button>
                        </div>
                        <form method="post" action="scripts/sc_new_comment.php?post=<?= $id_posts?>">
                            <div class="modal-body text-center">
                                <textarea class="w-50" name="descpost" type="text"></textarea>
                            </div>
                            <p class="text-center mt-1">Selecione imagem</p>
                            <input type="file" class="form-control w-50 mx-auto bg-light border-0 mb-4" name="fileToUpload" id="customFile"/>
                            <div class="row justify-content-center mt-4">
                                <button class="btnlogin w-50 text-center" type="submit">Submeter</button>
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

            <!-- GUARDAR -->
            <!-- Button trigger modal -->
            <div class="modal show margemmodal" id="myModal3<?=$id_posts?>">

                <div class="modal-dialog modal-lg modal-dialog-centered">

                    <!-- CONTEÚDO DO MODAL ######################### -->
                    <div class="modal-content bg-white text-dark bordermodal">

                        <!-- CABEÇALHO DO MODAL ######################### -->
                        <div class="modal-header mx-auto">
                            <h3 class="text-center pt-3">Tem a certeza que deseja guardar?</h3>
                        </div>

                        <form method="get" class="text-center" role="form">
                            <div class="row justify-content-center mx-auto mt-4">
                                <a class="btnlogin w-25 text-decoration-none mx-3" href="scripts/sc_guardados.php?post=<?= $id_posts; ?>">Guardar</a>
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

            <!-- APAGAR POST -->
            <!-- Button trigger modal -->
            <div class="modal show margemmodal" id="myModal4<?=$id_posts?>">

                <div class="modal-dialog modal-lg modal-dialog-centered">

                    <!-- CONTEÚDO DO MODAL ######################### -->
                    <div class="modal-content bg-white text-dark bordermodal">

                        <!-- CABEÇALHO DO MODAL ######################### -->
                        <div class="modal-header mx-auto">
                            <h3 class="text-center pt-3">Tem a certeza que deseja apagar?</h3>
                        </div>
                        <form method="get" class="text-center" role="form">
                            <div class="row justify-content-center mx-auto mt-4">
                                <a class="btnlogin w-25 text-decoration-none mx-3"
                                   href="scripts/sc_deletepost.php?post=<?= $id_posts?>">Apagar</a>
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

                <!-- APAGAR COMENTÁRIO -->
            <!-- Button trigger modal -->
            <div class="modal show margemmodal" id="myModal6<?=$id_comentario?>">

                <div class="modal-dialog modal-lg modal-dialog-centered">

                    <!-- CONTEÚDO DO MODAL ######################### -->
                    <div class="modal-content bg-white text-dark bordermodal">

                        <!-- CABEÇALHO DO MODAL ######################### -->
                        <div class="modal-header mx-auto">
                            <h3 class="text-center pt-3">Tem a certeza que deseja apagar?</h3>
                        </div>
                        <form method="get" class="text-center" role="form">
                            <div class="row justify-content-center mx-auto mt-4">
                                <a class="btnlogin w-25 text-decoration-none mx-3" href="scripts/sc_apagar_comentario.php?comentario=<?= $id_comentario?>">Apagar</a>
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
            }
            mysqli_stmt_close($stmt);
        }
        mysqli_close($link);

        ?>
    </span>

    <?php }?>


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
                        <button class="btnlogin w-25 text-center mr-3" data-dismiss="modal" type="button">Sim
                        </button>
                        <button class="btnlogin w-25 text-center ml-3" data-dismiss="modal" type="button">Não
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



</main>



