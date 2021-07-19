<?php

require_once "connections/connection.php";

if (isset($_GET['area'])) {
    $areas_id_areas = $_GET['area'];

$link = new_db_connection();

$stmt = mysqli_stmt_init($link);


$query = "SELECT temas.id_temas, temas.nome_tema, areas.id_areas, grupo.id_grupo, grupo.nome_grupo, grupo.imagem_grupo, grupo.temas_id_temas FROM temas
INNER JOIN areas
ON areas_id_areas = areas.id_areas
INNER JOIN grupo
ON temas.id_temas = grupo.temas_id_temas
WHERE areas_id_areas = ?";

    if (mysqli_stmt_prepare($stmt, $query)) {

            mysqli_stmt_bind_param($stmt, 'i', $areas_id_areas);
        }
        mysqli_stmt_execute($stmt);

        mysqli_stmt_bind_result($stmt, $id, $nome_tema, $areas_id_areas, $id_grupo, $nome_grupo, $imagem_grupo,
            $id_tema_grupo); ?>
        <main class="container-fluid mt-lg-5">

        <div class="galeria row mx-auto my-5 py-5">

            <?php
        while (mysqli_stmt_fetch($stmt)) {
            ?>
                    <div class="col-6 col-md-4 col-lg-3 mb-2">
                        <a href="perfil_tribo.php?grupo=<?= $id ?>">
                            <img src="images/<?=$imagem_grupo ?>" class="img-fluid m-2 redondo shadow">
                            <h4 class="text-center ml-2"><?= $nome_grupo ?></h4>
                        </a>
                    </div>
            <?php
        }
        ?>
        </div>
        </main>
        <?php

} ?>