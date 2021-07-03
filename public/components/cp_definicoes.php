<main class="container-fluid background">
    <section class="row">
        <div class="col-12 text-center">
            <a id="fechar" href="perfil.php" class="float-right pt-4 pr-4"><i class="fas fa-times fa-2x"></i></a>
            <p class="pt-5 pb-1 d-md-block d-none h">Definições</p>
            <p class="pt-5 pb-1 d-md-none h_pequeno">Definições</p>
        </div>
    </section>

    <section class="col-12 mt-5 ml-2">
        <a href="#" class="text-decoration-none" data-target="#myModalgroup" data-toggle="modal">
            <div class="row mt-5">
                <i class="fas fa-plus-circle fa-2x"></i>
                <p class="ml-3 h_definicoes">Criar Tribo</p>
            </div>
        </a>

        <a href="#" class="text-decoration-none">
            <div class="row mb-2 pt-4 border-top border-dark">
                <i class="far fa-2x fa-user"></i>
                <p class="ml-3 h_definicoes">Informações de Conta</p>
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

        <a href="#" class="text-decoration-none">
            <div class="row mb-2 pt-4 border-top border-dark">
                <i class="fas fa-heart-broken fa-2x"></i>
                <p class="ml-3 h_definicoes">Desativar Conta</p>
            </div>
        </a>

        <a href="login.php" class="text-decoration-none">
            <div class="row mb-2 py-4 border-top border-dark">
                <i class="fas fa-sign-out-alt fa-2x"></i>
                <p class="ml-3 h_definicoes">Terminar Sessão</p>
            </div>
        </a>
    </section>


    <!-- Modal da criacao de grupo -->
    <div class="modal show margemmodal" id="myModalgroup">

        <div class="modal-dialog modal-lg modal-dialog-centered">

            <!-- CONTEÚDO DO MODAL ######################### -->
            <div class="modal-content bg-white text-dark bordermodal">
                <div class="modal-header mx-auto">
                    <h2 class="text-center pt-3">Criar uma nova tribo</h2>
                    <button class="close ptt" data-dismiss="modal" type="button">&times;</button>
                </div>

                <!-- CABEÇALHO DO MODAL ######################### -->
                <form method="post" role="form" id="new-tribe-form" action="scripts/sc_new_tribo.php" enctype="multipart/form-data">
                    <p class="ml-3 mt-3 text-center">Nome da Tribo</p>
                    <input class="w-50 mx-auto" name="nome_tribo" type="text">
                    <div class="modal-body">
                        <p class="text-center">Descrição da Tribo</p>
                        <input class="w-50 mx-auto" name="descricao_tribo" type="text">
                        <p class="text-center mt-4">Selecione imagem para a Tribo</p>
                        <input type="file" class="form-control w-50 mx-auto bg-light border-0" name="fileToUpload" id="customFile1"/>
                        <div class="dropdown text-center mt-4">
                            <label>Sede da Tribo</label>
                            <select class="form-control" name="sedes_id_sede_grupo">
                                <?php

                                require_once "connections/connection.php";

                                $link = new_db_connection();


                                $stmt = mysqli_stmt_init($link);


                                $query = "SELECT id_sede_grupo, nome_sede FROM sedes ORDER BY nome_sede;";


                                if (mysqli_stmt_prepare($stmt, $query)) {



                                    mysqli_stmt_execute($stmt);

                                    mysqli_stmt_bind_result($stmt,  $id_sede_grupo, $nome_sede);


                                    while (mysqli_stmt_fetch($stmt)) {
                                        $selected1 = "";
                                        if ($sedes_id_sede_grupo == $id_sede_grupo) {
                                            $selected1 = "selected";
                                        }

                                        echo "<option value='$id_sede_grupo' $selected1>$nome_sede</option>";
                                    }


                                } else {

                                    echo "ERRORRRRR: " . mysqli_error($link);
                                }
                                //close connection

                                mysqli_stmt_close($stmt);



                                ?>
                            </select>
                        </div>
                        <div class="dropdown text-center mt-4">
                            <label>Área da Tribo</label>
                            <select class="form-control" name="$temas_id_temas">
                                <?php


                                $stmt = mysqli_stmt_init($link);


                                $query = "SELECT id_areas, nome_areas FROM areas ORDER BY nome_areas;";


                                if (mysqli_stmt_prepare($stmt, $query)) {


                                    mysqli_stmt_execute($stmt);

                                    mysqli_stmt_bind_result($stmt, $id_areas, $nome_areas);


                                    while (mysqli_stmt_fetch($stmt)) {
                                        $selected2 = "";
                                        if ($temas_id_temas == $id_areas) {
                                            $selected2 = "selected";
                                        }

                                        echo "<option value='$id_areas' $selected2>$nome_areas</option>";
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
                        <button class="btnlogin w-50 text-center col-4" type="submit">
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

    <!--  fim do Modal de criacao de grupo -->
</main>