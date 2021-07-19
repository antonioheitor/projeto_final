<main class="container-fluid mt-lg-4">
    <section class="row justify-content-center pt-lg-5 mb-4 pt-2">
        <form class="col-11 mt-lg-4" method="get" action="pesquisa.php">
            <div class="row">
                <input type="text" id="procurar" class="shadow-sm col-11" name="procurar" placeholder="Pesquisa...">
                <button value="Pesquisar" type="submit" class="col-1 btn btn-outline-none p-0"><i class="fas fa-search
                fa-2x"></i></button>
            </div>
        </form>
    </section>

    <section class="col-12">
        <div class="row">

    <?php
    require_once "connections/connection.php";

    $link = new_db_connection();







    $stmt1 = mysqli_stmt_init($link);
    $query1 = "SELECT" .
        " id_areas," .
        " nome_areas" .
        " FROM areas";


    if (mysqli_stmt_prepare($stmt1, $query1)) {

        mysqli_stmt_execute($stmt1);

        mysqli_stmt_bind_result($stmt1, $id_areas, $nome_areas);

        while (mysqli_stmt_fetch($stmt1)) { ?>

                            <article class="col-6 col-lg-4 my-3">
                                <section class="row">


                                    <article class="col-11 filtros shadow">
                                        <a href="pesquisa.php?area=<?=$id_areas?>">
                                            <h4 class="d-sm-block d-none"><?= $nome_areas ?></h4>
                                            <h6 class="d-sm-none"><?= $nome_areas ?></h6>
                                        </a>
                                    </article>
                                </section>
                            </article>


        <?php }
        mysqli_stmt_close($stmt1);
    }
    mysqli_close($link);


    ?>
        </div>
    </section>

</main>