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
                <form method="post">
                    <p class="ml-3 mt-3 text-center">Titulo da publicação</p><input class="w-50 mx-auto" name="titulopost" type="text">
                    <div class="modal-body text-center">
                        <p class="text-center">Escreve o post :)</p>
                        <textarea class="w-50" name="descpost" type="text"></textarea>
                        <p class="text-center mt-4">Selecione imagem</p>
                        <input type="file" class="form-control w-50 mx-auto bg-light border-0" id="customFile"/>
                        <div class="dropdown text-center mt-4">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Escolha a tua tribo
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Tribo do Skate</a>
                                <a class="dropdown-item" href="#">Tribo de Anime</a>
                                <a class="dropdown-item" href="#">Tribo do Rock</a>
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
    <!-- Fim Modal -->

    <section class="row my-4 justify-content-center ">
        <article class="col-11 borda_post shadow">
            <div class="row mt-1">
                <div class="col-2 col-md-2 col-lg-1 my-auto">
                    <img src="images/1.jpeg" class="img-fluid rounded-circle p-sm-1 border border-success">
                </div>
                <div class="col-8 col-sm-8 position-relative">
                    <h4 class="pt-3">Sara Rocha</h4>
                    <p>Tribo do Skate * 13/05/2021</p>
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
            </div>

            <div class="pt-2">
                <p>Malta!! Vocês sabiam que o Rob Dyrdek que apresenta o ridiculousness está classificado como o 6º
                    melhor skater de todos os tempos?? Vi uns vídeos dele e realmente ele é muito bom!! Vejam!
                </p>
                <div class="float-right pb-2">
                    <i class="fas fa-plus-circle fa-2x" data-target="#myModal2" data-toggle="modal"></i>
                </div>
            </div>
        </article>
    </section>

    <section class="row my-4 justify-content-center ">
        <article class="borda_post shadow col-11">
            <div class="row mt-1">
                <div class="col-2 col-md-2 col-lg-1 my-auto">
                    <img src="images/4.jpg" class="img-fluid rounded-circle p-sm-1">
                </div>
                <div class="col-8 col-sm-8 position-relative">
                    <h4 class="pt-3">Ana Pedro</h4>
                    <p>Tribo do Skate * 12/05/2021</p>
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
            </div>

            <div class="pt-2">
                <img src="images/3.jpg" class="img-fluid col-12 ">
                <div class="text-right py-2">
                    <i class="fas fa-plus-circle fa-2x" data-target="#myModal2" data-toggle="modal"></i>
                </div>
            </div>
        </article>
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