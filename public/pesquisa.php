<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta charset="UTF-8">
    <meta content="Antonio, Joana, Juliana e Mariana" name="author">
    <meta content="CBL" name="keywords">
    <meta content="Hi-Tribe" name="description">

    <!-- Bootstrap CSS -->
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/fontawesome-free/css/all.css">

    <script rel="preload" src="js/script%20pag.js"></script>

    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

    <title>Hi-Tribe</title>
</head>
<body>

<?php

include_once "components/cp_navigation.php";

?>
<main class="container-fluid mt-lg-5">
    <section class="row justify-content-center pt-3 mb-3">
        <form class="col-11 mt-lg-4">
            <input type="text" id="procura" class="shadow-sm" name="procura" placeholder="Desporto">
        </form>
    </section>


    <div class="galeria row mx-auto mb-5">
        <div class="col-6 col-md-4 col-lg-3 mb-2">
            <a href="#">
                <img src="images/futebol.jpg" class="img-fluid m-2 redondo shadow">
                <h4 class="text-center ml-2">Futebol</h4>
            </a>

        </div>
        <div class="col-6 col-md-4 col-lg-3 mb-3">
            <a href="perfil_tribo.php">
                <img src="images/skate.jpg" class="img-fluid m-2 redondo shadow">
                <h4 class="text-center ml-2">Skate</h4>
            </a>
        </div>
        <div class="col-6 col-md-4 col-lg-3 mb-3">
            <a href="#">
                <img src="images/basket.jpeg" class="img-fluid m-2 redondo shadow">
                <h4 class="text-center ml-2">Basket</h4>
            </a>
        </div>
        <div class="col-6 col-md-4 col-lg-3 mb-3">
            <a href="#">
                <img src="images/ballet.jpg" class="img-fluid m-2 redondo shadow">
                <h4 class="text-center ml-2">Ballet</h4>
            </a>
        </div>
        <div class="col-6 col-md-4 col-lg-3 mb-3">
            <a href="#">
                <img src="images/voley.jpg" class="img-fluid m-2 redondo shadow">
                <h4 class="text-center ml-2">Voley</h4>
            </a>
        </div>
        <div class="col-6 col-md-4 col-lg-3 mb-3">
            <a href="#">
                <img src="images/patinagem.jpg" class="img-fluid m-2 redondo shadow">
                <h4 class="text-center ml-2">Patinagem</h4>
            </a>
        </div>
        <div class="col-6 col-md-4 col-lg-3 mb-3">
            <a href="#">
                <img src="images/btt.jpeg" class="img-fluid m-2 redondo shadow">
                <h4 class="text-center ml-2">BTT</h4>
            </a>
        </div>
        <div class="col-6 col-md-4 col-lg-3 mb-3">
            <a href="#">
                <img src="images/rugby.jpg" class="img-fluid m-2 redondo shadow">
                <h4 class="text-center ml-2">Rugby</h4>
            </a>
        </div>

    </div>

</main>

</body>
</html>