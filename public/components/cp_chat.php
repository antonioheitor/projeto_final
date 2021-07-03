<?php
require_once "connections/connection.php";

if (isset($_GET["id"])) {
    $grupo_id_grupo = $_GET["id"];
}


$link = new_db_connection();

$stmt = mysqli_stmt_init($link);


$stmt = mysqli_stmt_init($link);
$query = "SELECT grupo_id_grupo ,nome_grupo FROM users_has_grupo INNER JOIN grupo ON grupo_id_grupo = id_grupo  WHERE grupo_id_grupo = ? ;";


if (mysqli_stmt_prepare($stmt, $query)) {

    mysqli_stmt_bind_param($stmt, 'i', $grupo_id_grupo);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_bind_result($stmt, $grupo_id_grupo, $nome_grupo);

    if (!mysqli_stmt_fetch($stmt)) {

        header("Location: users.php");

    }
}?>

<main class="container-fluid background">
    <section class="row sticky-top">
        <div class="col-12 text-center background">
            <a id="fechar" href="conversas.php" class="float-right pt-4 pr-4"><i class="fas fa-times fa-2x"></i></a>
            <p class="pt-5 pb-1 d-md-block d-none h"><?= $nome_grupo  ?></p>
            <p class="pt-5 pb-1 d-md-none h_pequeno"><?= $nome_grupo  ?></p>
        </div>
    </section>

    <section class="row mt-4">
        <article class="col-12">
            <img src="images/1.jpeg" class="avatar d-none d-md-block">
            <div class="row ml-2">
                <div class="col-10 col-lg-11 border border-dark rounded position-relative msgenviada">
                    <h4 class="pt-3 text-light">Albertina Roxane</h4>
                    <p class="text-light">Escangalhei-me a fazer um crooked grind, estou toda partida xd</p>
                </div>
            </div>
        </article>
    </section>

    <section class="row mt-4">
        <article class="col-12">
            <img src="images/1.jpeg" class="avatar d-none d-md-block">
            <div class="row ml-2">
                <div class="col-10 col-lg-11 border border-dark rounded position-relative msgenviada">
                    <h4 class="pt-3 text-light">Diogo Queijo</h4>
                    <p class="text-light">Ahahahaah quantas e quantas vezes xdd tenta mais que vais lá!</p>
                </div>
            </div>
        </article>
    </section>

    <section class="row mt-4">
        <article class="col-12">
            <img src="images/4.jpg" class="avatar d-none d-md-block">
            <div class="row ml-2">
                <div class="col-10 col-lg-11 border border-dark rounded position-relative msgenviada">
                    <h4 class="pt-3 text-light">Rafael Graça</h4>
                    <p class="text-light">Demorei bue tempo a fazer esse truque! </p>
                </div>
            </div>
        </article>
    </section>

    <article class="d-flex justify-content-end mt-4">
        <div class="mensagem border border-dark rounded bg-light">
            <p>AHAHAHAHAHAAH pagava para ter visto isso xdd</p>
        </div>
    </article>

    <section class="row mt-4">
        <article class="col-12">
            <img src="images/2.jpeg" class="avatar d-none d-md-block">
            <div class="row ml-2">
                <div class="col-10 col-lg-11 border border-dark rounded position-relative msgenviada">
                    <h4 class="pt-3 text-light">Sara Rocha</h4>
                    <p class="text-light">Tu a fazer esse e eu a fazer um boardslide! Já ando há semanas e ainda não
                        saiu perfeito :(</p>
                </div>
            </div>
        </article>
    </section>

    <section class="row mt-4">
        <article class="col-12">
            <img src="images/5.jpg" class="avatar d-none d-md-block">
            <div class="row ml-2">
                <div class="col-10 col-lg-11 border border-dark rounded position-relative msgenviada">
                    <h4 class="pt-3 text-light">Béu Furtado</h4>
                    <p class="text-light">Oh malta skatar é nice mas não se partam todos. Não quero ir ver ninguém
                        ao hospital. </p>
                </div>
            </div>
        </article>
    </section>

    <article class="d-flex justify-content-end mt-4">
        <div class="mensagem border border-dark rounded bg-light">
            <p>kkkkkkk uma vez um vizinho meu no skatepark de Ílhavo partiu-se todo!! Não estão a entender! Todo
                cheio de sangue, tive de o ver de perto para o reconhecer xdd</p>
        </div>
    </article>

    <section class="row mt-4">
        <article class="col-12">
            <img src="images/4.jpg" class="avatar d-none d-md-block">
            <div class="row ml-2">
                <div class="col-10 col-lg-11 border border-dark rounded position-relative msgenviada">
                    <h4 class="pt-3 text-light">Diogo Queijo</h4>
                    <p class="text-light">Eia goza??? Coitado!!</p>
                </div>
            </div>
        </article>
    </section>

    <section class="row mt-4">
        <article class="col-12">
            <img src="images/2.jpeg" class="avatar d-none d-md-block">
            <div class="row ml-2">
                <div class="col-10 col-lg-11 border border-dark rounded position-relative msgenviada">
                    <h4 class="pt-3 text-light">Ana Pedro</h4>
                    <p class="text-light">Ai nem me digam isso!! Agora até tenho medo!!</p>
                </div>
            </div>
        </article>
    </section>

    <article class="d-flex justify-content-end mt-4">
        <div class="mensagem border border-dark rounded bg-light">
            <p>Opa nada se consegue sem esforço!! Acho que todos os skaters já se partiram todos alguma vez na vida
                deles mas continuaram rijos sempre!!</p>
        </div>
    </article>

    <section class="row mt-4 mb-5">
        <article class="col-12 mb-5">
            <img src="images/1.jpeg" class="avatar d-none d-md-block">
            <div class="row ml-2">
                <div class="col-10 col-lg-11 border border-dark rounded position-relative msgenviada">
                    <h4 class="pt-3 text-light">Diva Martins</h4>
                    <p class="text-light">Grandes conquistas são compostas de uma serie de pequenas vitórias ;)</p>
                </div>
            </div>
        </article>
    </section>

    <section class="row fixed-bottom bg-light">
        <div class="col-12">
            <div class="row">
                <div class="col-9 col-md-10 pl-4">
                    <form class="py-2">
                        <input type="text" id="sms" name="sms" placeholder="Mensagem...">
                    </form>
                </div>
                <div class="col-3 col-md-2 my-auto text-center">
                    <i class="fas fa-plus-circle fa-2x pt-2 mx-1"></i>
                    <i class="fas fa-microphone fa-2x pt-2 mx-1"></i>
                </div>
            </div>

        </div>


    </section>

</main>