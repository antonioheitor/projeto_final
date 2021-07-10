<?php

require_once "connections/connection.php";

if (isset($_GET['area'])) {
    $areas_id_areas = $_GET['area'];

$link = new_db_connection();

$stmt = mysqli_stmt_init($link);


$query = "SELECT temas.id_temas, temas.nome_tema, areas.id_areas FROM temas
INNER JOIN areas
ON areas_id_areas = areas.id_areas
WHERE areas_id_areas = ?";



    if (mysqli_stmt_prepare($stmt, $query)) {

            mysqli_stmt_bind_param($stmt, 'i', $areas_id_areas);
        }
        mysqli_stmt_execute($stmt);

        mysqli_stmt_bind_result($stmt, $id, $nome, $areas_id_areas); ?>
        <main class="container-fluid mt-lg-5">

        <div class="galeria row mx-auto my-5 py-5">

            <?php
        while (mysqli_stmt_fetch($stmt)) {
            ?>

                    <div class="col-6 col-md-4 col-lg-3 mb-2">
                        <a href="perfil_tribo.php?tema=<?= $id ?>">
                            <img src="images/futebol.jpg" class="img-fluid m-2 redondo shadow">
                            <h4 class="text-center ml-2"><?= $nome ?></h4>
                        </a>
                    </div>

            <?php
        }
        ?>

        </div>
        </main>
        <?php

} ?>