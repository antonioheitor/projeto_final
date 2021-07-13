<?php

if (isset($_GET["tema_tribo"])) {
$temas_id_temas = $_GET["tema_tribo"];
}

?>


<main class="container-fluid background">
    <section class="row">
        <div class="col-12 text-center">
            <!-- Aqui falta o ?grupo= para saber em que tribo estamos por causa de voltar para trás -->
            <a id="fechar" href="perfil_tribo.php" class="float-right pt-4 pr-4"><i class="fas fa-times fa-2x"></i></a>
            <p class="pt-5 pb-1 d-md-block d-none h">Definições</p>
            <p class="pt-5 pb-1 d-md-none h_pequeno">Definições</p>
        </div>
    </section>

    <section class="col-12 mt-5 ml-2">
        <!-- Aqui falta o ?grupo= para saber em que tribo estamos por causa dos membros de cada tribo -->
        <a href="membros.php?tema_tribo=<?= $temas_id_temas ?>" class="text-decoration-none">
            <div class="row mt-5">
                <i class="fas fa-users fa-2x"></i>
                <p class="ml-3 h_definicoes">Membros</p>
            </div>
        </a>

        <a href="#" class="text-decoration-none" data-target="#myModal1" data-toggle="modal">
            <div class="row mb-2 pt-4 border-top border-dark">
                <i class="far fa-bell-slash fa-2x"></i>
                <p class="ml-3 h_definicoes">Silenciar</p>
            </div>
        </a>

        <a href="#" class="text-decoration-none" data-target="#myModal2" data-toggle="modal">
            <div class="row mb-2 pt-4 border-top border-dark">
                <i class="fas fa-bullhorn fa-2x"></i>
                <p class="ml-3 h_definicoes">Denunciar</p>
            </div>
        </a>

        <a href="#" class="text-decoration-none" data-target="#myModal3" data-toggle="modal">
            <div class="row mb-2 pt-4 border-top border-dark">
                <i class="fas fa-lock fa-2x"></i>
                <p class="ml-3 h_definicoes">Bloquear</p>
            </div>
        </a>

        <!-- Sq aqui conseguimos fazer um script para apagar as mensagens. Ou será que não dá porque não podemos apagar da base
         de dados porque não podemos apagar para todos? -->
        <a href="#" class="text-decoration-none" data-target="#myModal4" data-toggle="modal">
            <div class="row mb-2 pt-4 border-top border-dark">
                <i class="fas fa-trash-alt fa-2x"></i>
                <p class="ml-3 h_definicoes">Eliminar mensagens</p>
            </div>
        </a>

        <a href="#" class="text-decoration-none">
            <div class="row mb-2 pt-4 border-top border-dark">
                <i class="fas fa-question-circle fa-2x"></i>
                <p class="ml-3 h_definicoes">Ajuda</p>
            </div>
        </a>

        <!-- Aqui também deve ser preciso, não? -->
        <a href="perfil%20tribo.php" class="text-decoration-none">
            <div class="row mb-2 py-4 border-top border-dark">
                <i class="fas fa-sign-out-alt fa-2x"></i>
                <p class="ml-3 h_definicoes">Sair da tribo</p>
            </div>
        </a>
    </section>

    <!-- MODAL SILENCIAR -->
    <div class="modal show margemmodal" id="myModal1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <!-- CONTEÚDO DO MODAL ######################### -->
            <div class="modal-content bg-white text-dark bordermodal">
                <!-- CABEÇALHO DO MODAL ######################### -->
                <div class="modal-header mx-auto">
                    <h3 class="text-center pt-3">Tem a certeza que deseja silenciar?</h3>
                </div>
                <form method="post" role="form" id="normal-form" action="#">
                    <div class="row justify-content-center mt-4">
                        <button class="btnlogin w-50 text-center col-4 mx-2" type="submit">Silenciar</button>
                        <button class="btnlogin w-50 text-center col-4 mx-2" type="submit">Cancelar</button>
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

    <!-- MODAL DENUNCIAR -->
    <div class="modal show margemmodal" id="myModal2">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <!-- CONTEÚDO DO MODAL ######################### -->
            <div class="modal-content bg-white text-dark bordermodal">
                <!-- CABEÇALHO DO MODAL ######################### -->
                <div class="modal-header mx-auto">
                    <h3 class="text-center pt-3">Tem a certeza que deseja denunciar?</h3>
                </div>
                <form method="post" role="form" id="normal-form" action="#">
                    <div class="row justify-content-center mt-4">
                        <button class="btnlogin w-50 text-center col-4 mx-2" type="submit">Denunciar</button>
                        <button class="btnlogin w-50 text-center col-4 mx-2" type="submit">Cancelar</button>
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

    <!-- MODAL BLOQUEAR -->
    <div class="modal show margemmodal" id="myModal3">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <!-- CONTEÚDO DO MODAL ######################### -->
            <div class="modal-content bg-white text-dark bordermodal">
                <!-- CABEÇALHO DO MODAL ######################### -->
                <div class="modal-header mx-auto">
                    <h3 class="text-center pt-3">Tem a certeza que deseja bloquear?</h3>
                </div>
                <form method="post" role="form" id="normal-form" action="#">
                    <div class="row justify-content-center mt-4">
                        <button class="btnlogin w-50 text-center col-4 mx-2" type="submit">Bloquear</button>
                        <button class="btnlogin w-50 text-center col-4 mx-2" type="submit">Cancelar</button>
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

    <!-- MODAL APAGAR MENSAGENS -->
    <div class="modal show margemmodal" id="myModal4">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <!-- CONTEÚDO DO MODAL ######################### -->
            <div class="modal-content bg-white text-dark bordermodal">
                <!-- CABEÇALHO DO MODAL ######################### -->
                <div class="modal-header mx-auto">
                    <h3 class="text-center pt-3">Tem a certeza que deseja eliminar as mensagens?</h3>
                </div>
                <form method="post" role="form" id="normal-form" action="#">
                    <div class="row justify-content-center mt-4">
                        <button class="btnlogin w-50 text-center col-4 mx-2" type="submit">Eliminar</button>
                        <button class="btnlogin w-50 text-center col-4 mx-2" type="submit">Cancelar</button>
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
