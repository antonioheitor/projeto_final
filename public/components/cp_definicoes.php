<?php
session_start();
?>

<main class="container-fluid background">
    <section class="row">
        <div class="col-12 text-center">
            <a id="fechar" href="perfil.php" class="float-right pt-4 pr-4"><i class="fas fa-times fa-2x"></i></a>
            <p class="pt-5 pb-1 d-md-block d-none h">Definições</p>
            <p class="pt-5 pb-1 d-md-none h_pequeno">Definições</p>
        </div>
    </section>

    <section class="col-12 mt-5 ml-2">
        <?php
        if (isset($_SESSION['id'])) {
            if ($_SESSION['role'] == "1") {
                echo "<a href='../admin/index.php' class='text-decoration-none'>
                        <div class='row mt-5'>
                            <i class='fas fa-user-shield fa-2x'></i>
                            <p class='ml-3 h_definicoes'>Admin</p>
                        </div>
                      </a>";
            }
        }
        ?>

        <a href="#" class="text-decoration-none" data-target="#myModalgroup" data-toggle="modal">
            <div class="row pt-4 border-top border-dark">
                <i class="fas fa-plus-circle fa-2x"></i>
                <p class="ml-3 h_definicoes">Criar tribo</p>
            </div>
        </a>
        <a href="alterar_dados_perfil.php" class="text-decoration-none">
            <div class="row mb-2 pt-4 border-top border-dark">
                <i class="fa-2x fas fa-user-edit"></i>
                <p class="ml-3 h_definicoes">Alterar dados perfil</p>
            </div>
        </a>

        <a href="alterar_foto_perfil.php" class="text-decoration-none">
            <div class="row mb-2 pt-4 border-top border-dark">
                <i class="fa-2x far fa-images"></i>
                <p class="ml-3 h_definicoes">Alterar foto perfil</p>
            </div>
        </a>

        <a href="#" class="text-decoration-none">
            <div class="row mb-2 pt-4 border-top border-dark">
                <i class="fas fa-key fa-2x"></i>
                <p class="ml-3 h_definicoes">Segurança</p>
            </div>
        </a>

        <a href="#" class="text-decoration-none">
            <div class="row mb-2 pt-4 border-top border-dark">
                <i class="far fa-bell fa-2x"></i>
                <p class="ml-3 h_definicoes">Notificações</p>
            </div>
        </a>

        <a href="#" class="text-decoration-none">
            <div class="row mb-2 pt-4 border-top border-dark">
                <i class="fas fa-globe fa-2x"></i>
                <p class="ml-3 h_definicoes">Idioma</p>
            </div>
        </a>

        <a href="#" class="text-decoration-none">
            <div class="row mb-2 pt-4 border-top border-dark">
                <i class="fas fa-question-circle fa-2x"></i>
                <p class="ml-3 h_definicoes">Ajuda</p>
            </div>
        </a>

        <a href="#" data-target="#myModal3" data-toggle="modal" class="text-decoration-none">
            <div class="row mb-2 pt-4 border-top border-dark">
                <i class="fas fa-heart-broken fa-2x"></i>
                <p class="ml-3 h_definicoes">Desativar Conta</p>
            </div>
        </a>

        <a href="#" data-target="#myModal2" data-toggle="modal" class="text-decoration-none">
            <div class="row mb-2 py-4 border-top border-dark">
                <i class="fas fa-sign-out-alt fa-2x"></i>
                <p class="ml-3 h_definicoes">Terminar Sessão</p>
            </div>
        </a>
    </section>

    <!-- MODAL DESATIVAR -->
    <div class="modal show margemmodal" id="myModal3">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <!-- CONTEÚDO DO MODAL ######################### -->
            <div class="modal-content bg-white text-dark bordermodal">
                <!-- CABEÇALHO DO MODAL ######################### -->
                <div class="modal-header mx-auto">
                    <h3 class="text-center pt-3">Tem a certeza que deseja desativar a sua conta?</h3>
                </div>
                <form method="get" class="text-center" role="form">
                    <div class="row justify-content-center mx-auto mt-4">
                        <a class="btnlogin w-25 text-decoration-none mx-3" href="scripts/sc_desativar.php">Desativar</a>
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

    <!-- MODAL TERMINAR SESSÃO -->
    <div class="modal show margemmodal" id="myModal2">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <!-- CONTEÚDO DO MODAL ######################### -->
            <div class="modal-content bg-white text-dark bordermodal">
                <!-- CABEÇALHO DO MODAL ######################### -->
                <div class="modal-header mx-auto">
                    <h3 class="text-center pt-3">Tem a certeza que deseja terminar sessão?</h3>
                </div>
                <form method="get" class="text-center" role="form">
                    <div class="row justify-content-center mx-auto mt-4">
                        <a class="btnlogin w-25 text-decoration-none mx-3" href="scripts/sc_logout.php">Terminar</a>
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
    <?php
    require_once "connections/connection.php";


    $link = new_db_connection();

    $stmt = mysqli_stmt_init($link);

    $query = "SELECT id_grupo, nome_grupo, descricao_grupo, imagem_grupo, sedes_id_sede_grupo, temas_id_temas FROM grupo WHERE id_grupo = 4";


    if (mysqli_stmt_prepare($stmt, $query)) {
        if (mysqli_stmt_execute($stmt)) {

            mysqli_stmt_bind_result($stmt, $id_grupo, $nome_grupo, $descricao_grupo, $imagem_grupo, $sedes_id_sede_grupo, $temas_id_temas);

            if (!mysqli_stmt_fetch($stmt)) {
                /* Tinha aqui um header com location para users.php que estava a dar erro porque pronto, a página não existe.
                Não sei quem pos nem porquê, mas digam quando virem isto please */
            }

            $_SESSION["id_grupo"] = $id_grupo;

        } else {

        }
        //mostrar o codigo a apresentar
    } else {

        echo "ERRORRRRR: " . mysqli_error($link);
    }
    mysqli_stmt_close($stmt);
    ?>

    <!-- Modal da criacao de grupo -->
    <div class="modal show margemmodal" id="myModalgroup">

        <div class="modal-dialog modal-lg modal-dialog-centered">

            <!-- CONTEÚDO DO MODAL ######################### -->
            <div class="modal-content bg-white text-dark bordermodal">
                <div class="modal-header mx-auto">
                    <h2 class="text-center pt-3">Cria a tua tribo</h2>
                    <button class="close ptt" data-dismiss="modal" type="button">&times;</button>
                </div>
                <!-- CABEÇALHO DO MODAL ######################### -->
                <form method="post" role="form" id="new-tribe-form" action="scripts/sc_new_tribo.php"
                      enctype="multipart/form-data">
                    <div class="modal-body">
                        <p class="text-center mt-4">Escolhe uma descrição</p>
                        <input class="w-50 mx-auto" name="descricao_tribo" type="text" placeholder="Descrição">
                        <p class="text-center mt-4">Escolhe uma imagem</p>
                        <input type="file" class="form-control w-50 mx-auto bg-light border-0" name="img_grupo"
                               id="img_grupo"/>
                        <div class="dropdown text-center mt-4">
                            <label>Escolhe uma sede</label>
                            <select class="w-50 mx-auto form-control" name="sedes_id_sede_grupo">
                                <?php
                                $stmt = mysqli_stmt_init($link);

                                $query = "SELECT id_sede_grupo, nome_sede FROM sedes ORDER BY nome_sede;";

                                if (mysqli_stmt_prepare($stmt, $query)) {

                                    mysqli_stmt_execute($stmt);

                                    mysqli_stmt_bind_result($stmt, $id_sede_grupo, $nome_sede);

                                    while (mysqli_stmt_fetch($stmt)) {
                                        echo " <option value=\"$id_sede_grupo\" selected>$nome_sede</option>";
                                    }
                                    echo "<option value='NULL' selected>Nenhum</option>";
                                } else {
                                    echo "ERRORRRRR: " . mysqli_error($link);
                                }
                                //close connection
                                mysqli_stmt_close($stmt);
                                ?>
                            </select>
                        </div>

                        <div class="dropdown text-center mt-4">
                            <label>Escolhe um tema</label>
                            <select class="w-50 mx-auto form-control" name="temas_id_temas">
                                <?php
                                $stmt = mysqli_stmt_init($link);
                                $query = "SELECT temas.id_temas, temas.nome_tema, temas.areas_id_areas FROM temas
                                        WHERE temas.id_temas NOT IN (SELECT grupo.temas_id_temas FROM grupo)
                                        ORDER BY nome_tema;";
                                if (mysqli_stmt_prepare($stmt, $query)) {
                                    mysqli_stmt_execute($stmt);

                                    mysqli_stmt_bind_result($stmt, $id_temas, $nome_tema, $id_area);

                                    while (mysqli_stmt_fetch($stmt)) {
                                        echo " <option value=\"$id_temas\" selected>$nome_tema</option>";
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
                        <button class="btnlogin w-50 text-center col-4 mt-2" type="submit">Submeter dados</button>
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

    <!--  fim do Modal de criacao de grupo -->
</main>