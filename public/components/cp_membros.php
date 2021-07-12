<main class="container-fluid background">
    <section class="row">
        <div class="col-12 text-center">
            <!-- Se fizermos nas definições, provavelmente temos de fazer ?grupo= aqui também, não? Estou kinda confusa :/ -->
            <a id="fechar" href="definicoestribo.php" class="float-right pt-4 pr-4"><i
                    class="fas fa-times fa-2x"></i></a>
            <p class="pt-5 pb-1 d-md-block d-none h">Membros</p>
            <p class="pt-5 pb-1 d-md-none h_pequeno">Membros</p>
        </div>
    </section>

    <section class="row justify-content-center pt-3">
        <form class="col-11">
            <input type="text" id="procura" name="procura" placeholder="Pesquisa por um membro" class="shadow-sm">
        </form>
    </section>

    <section class="row my-4 justify-content-center">
        <article class="col-11">
            <div class="row mt-2">
                <div class="col-2 col-md-2 col-lg-1 my-auto">
                    <img src="images/1.jpeg" class="img-fluid rounded-circle p-sm-1 border border-success">
                </div>
                <div class="col-8 col-sm-8 position-relative">
                    <h4 class="pt-3">Sara Rocha</h4>
                    <p>Líder</p>
                </div>
                <div class="col-2 col-lg-3 text-right my-auto">
                    <div class="dropdown show">
                        <div class="btn-group dropleft">
                            <button type="button" class="btn btn-secondary dropdown-toggle shadow-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#" data-target="#myModal1" data-toggle="modal">Votar</a>
                                <a class="dropdown-item" href="#" data-target="#myModal2" data-toggle="modal">Apagar membro</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-2 col-md-2 col-lg-1 my-auto">
                    <img src="images/9.jpg" class="img-fluid rounded-circle p-sm-1 border border-secondary">
                </div>
                <div class="col-8 col-sm-8 position-relative">
                    <h4 class="pt-3">Diogo Queijo</h4>
                    <p>Co-líder</p>
                </div>
                <div class="col-2 col-lg-3 text-right my-auto">
                    <div class="btn-group dropleft">
                        <button type="button" class="btn btn-secondary dropdown-toggle shadow-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#" data-target="#myModal1" data-toggle="modal">Votar</a>
                            <a class="dropdown-item" href="#" data-target="#myModal2" data-toggle="modal">Apagar membro</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-2 col-md-2 col-lg-1 my-auto">
                    <img src="images/8.jpg" class="img-fluid rounded-circle p-sm-1 border border-danger">
                </div>
                <div class="col-8 col-sm-8 position-relative">
                    <h4 class="pt-3">Vitória Britodamana</h4>
                    <p>Ancião</p>
                </div>
                <div class="col-2 col-lg-3 text-right my-auto">
                    <div class="btn-group dropleft">
                        <button type="button" class="btn btn-secondary dropdown-toggle shadow-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#" data-target="#myModal1" data-toggle="modal">Votar</a>
                            <a class="dropdown-item" href="#" data-target="#myModal2" data-toggle="modal">Apagar membro</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-2 col-md-2 col-lg-1 my-auto">
                    <img src="images/10.jpg" class="img-fluid rounded-circle p-sm-1 border border-warning">
                </div>
                <div class="col-8 col-sm-8 position-relative">
                    <h4 class="pt-3">Diva Martins</h4>
                    <p>Mestre</p>
                </div>
                <div class="col-2 col-lg-3 text-right my-auto">
                    <div class="btn-group dropleft">
                        <button type="button" class="btn btn-secondary dropdown-toggle shadow-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#" data-target="#myModal1" data-toggle="modal">Votar</a>
                            <a class="dropdown-item" href="#" data-target="#myModal2" data-toggle="modal">Apagar membro</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-2 col-md-2 col-lg-1 my-auto">
                    <img src="images/5.jpg" class="img-fluid rounded-circle p-sm-1">
                </div>
                <div class="col-8 col-sm-8 position-relative">
                    <h4 class="pt-3">André Feliz</h4>
                    <p>⠀⠀⠀⠀⠀⠀⠀⠀⠀</p>
                </div>
                <div class="col-2 col-lg-3 text-right my-auto">
                    <div class="btn-group dropleft">
                        <button type="button" class="btn btn-secondary dropdown-toggle shadow-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#" data-target="#myModal1" data-toggle="modal">Votar</a>
                            <a class="dropdown-item" href="#" data-target="#myModal2" data-toggle="modal">Apagar membro</a>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </section>

    <!-- VOTAR -->
    <!-- Button trigger modal -->
    <div class="modal show margemmodal" id="myModal1">

        <div class="modal-dialog modal-lg modal-dialog-centered">

            <!-- CONTEÚDO DO MODAL ######################### -->
            <div class="modal-content bg-white text-dark bordermodal">

                <!-- CABEÇALHO DO MODAL ######################### -->
                <div class="modal-header mx-auto">
                    <h3 class="text-center pt-3">Votações</h3>
                    <button class="close ptt" data-dismiss="modal" type="button">&times;</button>
                </div>
                <form method="post" class="text-center">
                    <div class="form-check my-4">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">Líder</label>
                    </div>
                    <div class="form-check my-4">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">Co-Líder</label>
                    </div>
                    <div class="form-check my-4">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3"
                               checked>
                        <label class="form-check-label" for="flexRadioDefault2">Mestre</label>
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

    <!-- APAGAR MEMBRO -->
    <!-- Button trigger modal -->
    <div class="modal show margemmodal" id="myModal2">

        <div class="modal-dialog modal-lg modal-dialog-centered">

            <!-- CONTEÚDO DO MODAL ######################### -->
            <div class="modal-content bg-white text-dark bordermodal">

                <!-- CABEÇALHO DO MODAL ######################### -->
                <div class="modal-header mx-auto">
                    <h3 class="text-center pt-3">Tem a certeza que deseja apagar o membro?</h3>
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
