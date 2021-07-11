<?php

require_once "connections/connection.php";

if (isset($_GET["grupo"])) {
    $grupo = $_GET["grupo"];
}
?>


<main class="container-fluid background">
    <section class="row">
        <div class="col-12 text-center">
            <a id="fechar" href="perfil_tribo.php?grupo=<?= $grupo ?>" class="float-right pt-4 pr-4"><i class="fas fa-times fa-2x"></i></a>
            <p class="pt-5 pb-1 d-md-block d-none h">Definições</p>
            <p class="pt-5 pb-1 d-md-none h_pequeno">Definições</p>
        </div>
    </section>

    <section class="col-12 mt-5 ml-2">
        <a href="membros.php" class="text-decoration-none">
            <div class="row mt-5">
                <i class="fas fa-users fa-2x"></i>
                <p class="ml-3 h_definicoes">Membros</p>
            </div>
        </a>

        <a href="#" class="text-decoration-none">
            <div class="row mb-2 pt-4 border-top border-dark">
                <i class="far fa-bell-slash fa-2x"></i>
                <p class="ml-3 h_definicoes">Silenciar</p>
            </div>
        </a>

        <a href="#" class="text-decoration-none">
            <div class="row mb-2 pt-4 border-top border-dark">
                <i class="fas fa-bullhorn fa-2x"></i>
                <p class="ml-3 h_definicoes">Denunciar</p>
            </div>
        </a>

        <a href="#" class="text-decoration-none">
            <div class="row mb-2 pt-4 border-top border-dark">
                <i class="fas fa-lock fa-2x"></i>
                <p class="ml-3 h_definicoes">Bloquear</p>
            </div>
        </a>

        <a href="#" class="text-decoration-none">
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

        <a href="perfil%20tribo.php" class="text-decoration-none">
            <div class="row mb-2 py-4 border-top border-dark">
                <i class="fas fa-sign-out-alt fa-2x"></i>
                <p class="ml-3 h_definicoes">Sair da tribo</p>
            </div>
        </a>
    </section>
</main>
