<main class="container-fluid">
    <section class="row justify-content-center pt-3 mb-3">
        <form class="col-11 mt-lg-4">
            <div class="row">
                <input type="text" id="procura" class="shadow-sm col-11" name="procura" placeholder="Pesquisa...">
                <button type="submit" class="col-1 btn btn-outline-none p-0"><i class="fas fa-search
                fa-2x"></i></button>
            </div>
        </form>
    </section>

    <section class="col-12">
        <div class="row">


    <?php

    require_once "connections/connection.php";


    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);
    $query = "SELECT" .
        " id_areas," .
        " nome_areas" .
        " FROM areas";


    if (mysqli_stmt_prepare($stmt, $query)) {

        mysqli_stmt_execute($stmt);

        mysqli_stmt_bind_result($stmt, $id_areas, $nome_areas);

        while (mysqli_stmt_fetch($stmt)) { ?>

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
        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);


    ?>
        </div>
    </section>

</main>