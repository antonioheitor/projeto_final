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
                <form method="post">
                    <p class="ml-3 mt-3 text-center">Nome da Tribo</p><input class="w-50 mx-auto"
                                                                             name="nome_tribo" type="text">
                    <div class="modal-body">
                        <p class="text-center">Descrição da Tribo</p><input class="w-50 mx-auto" name="descricao_tribo"
                                                                            type="text">
                        <p class="text-center mt-4">Selecione imagem para a Tribo</p>
                        <input type="file" class="form-control w-50 mx-auto bg-light border-0" id="customFile1"/>
                        <div class="dropdown text-center mt-4">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Sede da Tribo
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <a class="dropdown-item" href="#">Parque da Macaca</a>
                                <a class="dropdown-item" href="#">Parque dos Drinks</a>
                                <a class="dropdown-item" href="#">Skate Park</a>
                            </div>
                        </div>
                        <div class="dropdown text-center mt-4">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Tema da Tribo
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                <a class="dropdown-item" href="#">Desporto</a>
                                <a class="dropdown-item" href="#">Musica</a>
                                <a class="dropdown-item" href="#">Comida</a>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <button class="btnlogin w-50 text-center" data-dismiss="modal" type="button">
                            Submeter
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