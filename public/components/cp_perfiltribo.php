<?php
require_once "connections/connection.php";

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
}

if (isset($_GET["grupo"])) {
    $id_grupo = $_GET["grupo"];
}


$link = new_db_connection();

$stmt = mysqli_stmt_init($link);

$query = "SELECT id_grupo, nome_grupo, descricao_grupo, imagem_grupo, sedes_id_sede_grupo
FROM grupo
WHERE id_grupo = ?";


if (mysqli_stmt_prepare($stmt, $query)) {

    mysqli_stmt_bind_param($stmt, 'i', $id_grupo);

    if (mysqli_stmt_execute($stmt)) {

        mysqli_stmt_bind_result($stmt, $id_grupo, $nome_grupo, $descricao_grupo, $imagem_grupo, $sedes_id_sede_grupo);

        while (mysqli_stmt_fetch($stmt)) {
        };
        //mostrar o codigo a apresentar
    } else {
        echo "ERRORRRRR: " . mysqli_error($link);
    }
    mysqli_stmt_close($stmt);
}
?>

<main class="container-fluid background pb-5">
    <section class="row">
        <a href="filtros.php" class="m-3 esq"><i class="fas fa-arrow-left fa-2x"></i></a>
        <a id="def" href="definicoestribo.php?grupo=<?= $id_grupo ?>" class="m-3 dto"><i
                    class="fas fa-cog fa-2x"></i></a>
    </section>

    <section class="row justify-content-center align-items-stretch">
        <img src="images/<?= $imagem_grupo ?>" alt="" class="w-100">
    </section>

    <section class="row justify-content-center mt-2">
        <p class="pt-5 pb-1 d-md-block d-none h">Tribo de <?= $nome_grupo ?></p>
        <p class="pt-5 pb-1 d-md-none h_pequeno text-center">Tribo de <?= $nome_grupo ?></p>
    </section>

    <section class="justify-content-center mt-2 row">
        <p class="col-11 text-center font-weight-bold"><?= $descricao_grupo ?></p>
    </section>


    <?php
    if (isset($sedes_id_sede_grupo)) {

        $stmt = mysqli_stmt_init($link);

        $query = "SELECT sedes.id_sede_grupo, sedes.nome_sede, grupo.id_grupo FROM sedes
INNER JOIN grupo
ON sedes.id_sede_grupo = grupo.sedes_id_sede_grupo
WHERE grupo.id_grupo = ?";


        if (mysqli_stmt_prepare($stmt, $query)) {

            mysqli_stmt_bind_param($stmt, 'i', $id_grupo);

            if (mysqli_stmt_execute($stmt)) {

                mysqli_stmt_bind_result($stmt, $sedes_id_sede_grupo, $nome_sede, $id_grupo);

                while (mysqli_stmt_fetch($stmt)) {
                };
                //mostrar o codigo a apresentar
            } else {
                echo "ERRORRRRR: " . mysqli_error($link);
            }
            mysqli_stmt_close($stmt);
        }

        ?>
        <section class="justify-content-center mt-2 row">
            <div class="col-8">
                <div class="row borda_post shadow-sm text-center pt-3 pb-2">
                    <h5 class="col-12 text-center"><b>Sede:</b> <?= $nome_sede ?></h5>
                </div>
            </div>
        </section>
    <?php
    }
    ?>


    <section class="row justify-content-center mt-3 pt-3 mb-5">
        <form method="post" class="w-50 text-center" role="form" id="register-form" action="scripts/sc_entrar_tribo
        .php?grupo=<?= $id_grupo ?>" enctype="multipart/form-data">
            <button class="btnlogin text-center col-5 col-md-4 col-lg-3" data-dismiss="modal" type="submit"
                    id="entrar">Entrar
            </button>
        </form>
    </section>
</main>
