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
<main class="container-fluid">
    <section class="row mt-lg-5 pt-lg-5">
        <article class="col-12 pt-3">
            <a href="definicoes.php"><i class="fas fa-cog fa-2x fa-lg-3x float-right"></i></a>
        </article>
    </section>
    <section class="row">
        <article class="col-12 pt-3">
            <a href="guardados.php"><i class="far fa-bookmark fa-2x fa-lg-3x float-right pr-1"></i></a>
        </article>
    </section>

    <section class="row no-gutters">
        <article class="col-12 text-center">
            <img class="rounded-circle perfil" src="images/2.jpeg">
        </article>
    </section>

    <article class="col-12 text-center mb-5">
        <h1 class="mt-3"> Sebastião Lemos </h1>
        <h2 class="mt-1">Gestão, UA</h2>
    </article>


    <section class="row justify-content-center">

        <article class="col-6 col-md-4 borda_post text-center mx-5 my-3 shadow">
            <div class="m-1 m-sm-3">
                <img src="images/rock.jpg" class="img-fluid rounded mt-3">
                <h5 class="mt-2">Tribo do Rock</h5>
                <a href="#" class="cor text-decoration-none">Entra na conversa</a>
            </div>

        </article>

        <article class="col-6 col-md-4 borda_post text-center mx-5 my-3 shadow">
            <div class="m-1 m-sm-3">
                <img src="images/rock.jpg" class="img-fluid rounded mt-3">
                <h5 class="mt-2">Tribo do Rock</h5>
                <a href="#" class="cor text-decoration-none">Entra na conversa</a>
            </div>

        </article>

        <article class="col-6 col-md-4 borda_post text-center mx-5 my-3 shadow">
            <div class="m-1 m-sm-3">
                <img src="images/rock.jpg" class="img-fluid rounded mt-3">
                <h5 class="mt-2">Tribo do Rock</h5>
                <a href="#" class="cor text-decoration-none">Entra na conversa</a>
            </div>
        </article>

        <article class="col-6 col-md-4 borda_post text-center mx-5 my-3 shadow">
            <div class="m-1 m-sm-3">
                <img src="images/rock.jpg" class="img-fluid rounded mt-3">
                <h5 class="mt-2">Tribo do Rock</h5>
                <a href="#" class="cor text-decoration-none">Entra na conversa</a>
            </div>
        </article>

    </section>

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