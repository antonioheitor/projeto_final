<?php require_once "../connections/connection.php";;

$link = new_db_connection();

$stmt = mysqli_stmt_init($link);
$stmt2 = mysqli_stmt_init($link);

$query = "SELECT temas.id_temas, temas.nome_tema, areas.id_areas FROM temas
INNER JOIN areas
WHERE temas.areas_id_areas = areas.id_areas;";

$query2 = "SELECT temas.id_temas, temas.nome_tema, areas.id_areas FROM temas
INNER JOIN areas
WHERE areas.id_areas = ?";

if (isset($_GET["procura"])) {
    $query = $query . " WHERE temas.nome_tema LIKE ?";
    if (mysqli_stmt_prepare($stmt, $query)) {
        if (isset($_GET['procura'])) {
            $procura = "%" . $_GET['procura'] . "%";
            mysqli_stmt_bind_param($stmt, 's', $procura);
        }
        mysqli_stmt_execute($stmt);

        mysqli_stmt_bind_result($stmt, $id, $nome, $area);
        ?>
        <main class="container-fluid mt-lg-5">

            <div class="galeria row mx-auto my-5">
                <div class="col-6 col-md-4 col-lg-3 mb-2">
                    <a href="cp_perfiltribo.php?area=<?= $id ?>">
                        <img src="images/futebol.jpg" class="img-fluid m-2 redondo shadow">
                        <h4 class="text-center ml-2"><?= $nome ?></h4>
                    </a>
                </div>
            </div>
        </main>
        <?php
    }
} else {
    if (mysqli_stmt_prepare($stmt2, $query2)) {
        if (isset($_GET['area'])) {
            $area = $_GET['area'];
            mysqli_stmt_bind_param($stmt2, 's', $area);
        }
        mysqli_stmt_execute($stmt);

        mysqli_stmt_bind_result($stmt, $id, $nome, $area);
        while (mysqli_stmt_fetch($stmt)) {
            ?>

            <main class="container-fluid mt-lg-5">

                <div class="galeria row mx-auto my-5">
                    <div class="col-6 col-md-4 col-lg-3 mb-2">
                        <a href="cp_perfiltribo.php">
                            <img src="images/futebol.jpg" class="img-fluid m-2 redondo shadow">
                            <h4 class="text-center ml-2"><?= $nome ?></h4>
                        </a>
                    </div>
                </div>
            </main>
            <?php
        }
        ?>
        <?php
    }
} ?>