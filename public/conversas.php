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

    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

    <title>Conversas</title>
</head>
<body>
<?php

include_once "components/cp_navigation.php";

?>

<main class="container-fluid">
    <section class="row sticky-top mt-lg-5">
        <div class="col-12 text-center mt-lg-3 background">
            <p class="pt-5 pb-1 d-md-block d-none h">Conversas</p>
            <p class="pt-5 pb-1 d-md-none h_pequeno">Conversas</p>
        </div>
    </section>

    <section class="row my-3  justify-content-center">
        <article class="col-11 borda_post shadow my-3 p-4">
            <div class="row">
                <div class="col-10">
                    <h1 class="mb-0 py-3">Tribo de Animes </h1>
                </div>
                <div class="col-2 my-auto">
                    <i class="far fa-comment-dots fa-3x float-right"></i>
                </div>
            </div>
        </article>

        <article class="col-11 borda_post shadow my-3 p-4">
            <div class="row">
                <div class="col-10">
                    <a href="chat.php" class="text-decoration-none">
                        <h1 class="mb-0 py-3">Tribo de Skate </h1>
                    </a>
                </div>
                <div class="col-2 my-auto">
                    <i class="far fa-comment-dots fa-3x float-right"></i>
                </div>
            </div>
        </article>

        <article class="col-11 borda_post shadow my-3 p-4">
            <div class="row">
                <div class="col-10">
                    <h1 class="mb-0 py-3">Tribo de Rock </h1>
                </div>
                <div class="col-2 my-auto">
                    <i class="far fa-comment-dots fa-3x float-right"></i>
                </div>
            </div>
        </article>
    </section>
</main>

</body>
</html>