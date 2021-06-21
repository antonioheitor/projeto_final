<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hi-Tribe</title>
    <!-- Bootstrap CSS -->
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/fontawesome-free/css/all.css">

    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
</head>
<body>


<main class="container-fluid my-lg-5">
    <section class="row sticky-top">
        <div class="col-12 text-center background">
            <a id="fechar" href="perfil.php" class="float-right pt-4 pr-4"><i class="fas fa-times fa-2x"></i></a>
            <p class="pt-5 pb-1 d-md-block d-none h">Os teus guardados</p>
            <p class="pt-5 pb-1 d-md-none h_pequeno">Os teus guardados</p>
        </div>
    </section>

    <section class="row my-4 justify-content-center ">
        <article class="col-11 borda_post shadow">
            <div class="row mt-1">
                <div class="col-2 col-md-2 col-lg-1 my-auto">
                    <img src="images/1.jpeg" class="img-fluid rounded-circle p-sm-1">
                </div>
                <div class="col-8 col-sm-8 position-relative">
                    <h4 class="pt-3">Sara Rocha</h4>
                    <p>Tribo do Skate * 13/05/2021</p>
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

            <div class="row">
                <div class="pt-2">
                    <p class="col-12">Malta!! Vocês sabiam que o Rob Dyrdek que apresenta o ridiculousness está
                        classificado como
                        o 6º
                        melhor skater de todos os tempos?? Vi uns vídeos dele e realmente ele é muito bom!! Vejam!
                    </p>
                    <div class="float-right pb-2 mr-2">
                        <i class="fas fa-plus-circle fa-2x" data-target="#myModal2" data-toggle="modal"></i>
                    </div>
                </div>
            </div>

            <div class="row border-top">
                <div class="pt-2 col-11">
                    <div class="row justify-content-end ml-2">
                        <div class="col-2 col-sm-1 pr-0">
                            <i class="fas fa-reply fa-rotate-180 fa-2x"></i>
                        </div>
                        <div class="col-10 col-sm-11 pl-0">
                            <h6 class="col-10 mt-2">Maria Renato</h6>
                        </div>
                    </div>
                    <p class="ml-3">Malta!! Vocês sabiam que o Rob Dyrdek que apresenta o ridiculousness está
                        classificado como
                        o 6º
                        melhor skater de todos os tempos?? Vi uns vídeos dele e realmente ele é muito bom!! Vejam!
                    </p>
                </div>
            </div>

        </article>
    </section>

    <section class="row my-4 justify-content-center ">
        <article class="borda_post shadow col-11">
            <div class="row mt-1">
                <div class="col-2 col-md-2 col-lg-1 my-auto">
                    <img src="images/12.jpg" class="img-fluid rounded-circle p-sm-1">
                </div>
                <div class="col-8 col-sm-8 position-relative">
                    <h4 class="pt-3">Paulo Lopes</h4>
                    <p>Tribo de Rock * 13/05/2021</p>
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
                <p>Sabem aqueles tempos nostálgicos? Dei por mim a ouvir Supertramp - Paris, album icónico que me
                    leva para outro mundo! E melhor, ao vivo!! Apesar de já contar mais de 40 anos nunca é velho,
                    desatualizado! Grandes Reis do Rock!
                </p>
                <div class="float-right pb-2">
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
                    <h2 class="text-center pt-3">Comenta</h2>
                    <button class="close ptt" data-dismiss="modal" type="button">&times;</button>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <input class="w-50 mx-auto" name="descpost" type="text">
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
    <!-- Modal -->
</main>
</body>
</html>

<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>