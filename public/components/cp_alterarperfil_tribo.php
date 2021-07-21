<?php


session_start();

if (isset($_GET["grupo"])) {
    $id = $_GET["grupo"];
}

require_once "connections/connection.php";

$link = new_db_connection();

$stmt = mysqli_stmt_init($link);
$query = "SELECT descricao_grupo, imagem_grupo, sedes_id_sede_grupo FROM grupo
WHERE id_grupo = ?";

if (mysqli_stmt_prepare($stmt, $query)) {


    mysqli_stmt_bind_param($stmt, 'i', $id);

    if (mysqli_stmt_execute($stmt)) {

        mysqli_stmt_bind_result($stmt, $descricao_grupo, $imagem_grupo, $sede_grupo);

        if (!mysqli_stmt_fetch($stmt)) {

            echo "ERRO 1";

        }


    } else {

    }
    //mostrar o codigo a apresentar
} else {

    echo "ERRORRRRR: " . mysqli_error($link);
}
mysqli_stmt_close($stmt);



                    ?>

<main class="container-fluid background">
    <section class="row">
        <a id="fechar" href="perfil_tribo.php?grupo=<?= $id ?>" class="text-right col-12 pt-4 pr-4"><i class="fas fa-times fa-2x"></i></a>
        <div class="col-12 text-center">
            <p class="pb-1 d-md-block d-none h">A Tua Tribo</p>
            <p class="pb-1 d-md-none h_pequeno">A Tua Tribo</p>
        </div>
    </section>

    <?php

        ?>
        <form method="post" role="form" id="register-form" action="scripts/sc_alterarperfil_tribo.php?grupo=<?= $id ?>"
              enctype="multipart/form-data">
            <div class="form-group rounded">
                <p>Descrição Tribo</p>
                <input type="text" aria-describedby="name" name="descricao_grupo" value="<?=$descricao_grupo ?>">
            </div>
            <div class="form-group rounded bg-light pb-4">
                <p class="px-3 pt-3">Alterar foto da Tribo</p>
                <input type="file" class="form-control w-50 mx-auto border-0 bg-light" name="imagem"
                       id="customFile"/>
            </div>

            <div class="form-group">
                <label>Sede</label>
                <select class="form-control" name="sedes_id_sede_grupo">
                    <?php

                    $stmt = mysqli_stmt_init($link);

                    $query = "SELECT id_sede_grupo, nome_sede FROM sedes ORDER BY nome_sede";


                    if (mysqli_stmt_prepare($stmt, $query)) {


                        mysqli_stmt_execute($stmt);

                        mysqli_stmt_bind_result($stmt, $id_sede_grupo, $nome_sede);


                        while (mysqli_stmt_fetch($stmt)) {
                            $selected1 = "";
                            if ($sede_grupo == $id_sede_grupo) {
                                $selected1 = "selected";
                            }

                            echo "<option value='$id_sede_grupo' $selected1>$nome_sede</option>";
                        }


                    } else {

                        echo "ERRO 2";
                    }
                    //close connection

                    mysqli_stmt_close($stmt);
                    mysqli_close($link);


                    ?>
                </select>
            </div>

            <div class="row justify-content-center mt-3">
                <button class="btnlogin py-3 text-center col-4" type="submit">Alterar
                    Dados</button>
            </div>

        </form>

</main>
