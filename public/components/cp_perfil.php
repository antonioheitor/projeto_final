<?php
session_start();

if (isset($_SESSION["nome"])) {
    $USER_NAME = $_SESSION["nome"];

}

if (isset($_SESSION["id"])) {
    $USER_ID = $_SESSION["id"];

}

if (isset($_SESSION["role"])) {
    $USER_ROLE = $_SESSION["role"];

}
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
        <h1 class="mt-3"><?= $USER_NAME ?></h1>
        <h2 class="mt-1">Gestão, UA</h2>
    </article>

    <section class="row justify-content-center">
        <?php
        require_once "connections/connection.php";




        $link = new_db_connection();

        $stmt = mysqli_stmt_init($link);


        $stmt = mysqli_stmt_init($link);
        $query = "SELECT imagem_grupo, grupo_id_grupo ,nome_grupo FROM users_has_grupo INNER JOIN grupo ON grupo_id_grupo = id_grupo  WHERE users_id_users = ? ;";


        if (mysqli_stmt_prepare($stmt, $query)) {

        mysqli_stmt_bind_param($stmt, 'i', $USER_ID);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_bind_result($stmt, $imagem_grupo, $grupo_id_grupo, $nome_grupo );

        while (mysqli_stmt_fetch($stmt)) { ?>
        <article class="col-6 col-md-4 borda_post text-center mx-5 my-3 shadow">
            <div class="m-1 m-sm-3">
                <img src="images/rock.jpg" class="img-fluid rounded mt-3">
                <h5 class="mt-2"><?= $nome_grupo ?></h5>
                <a href="chat.php?id=<?= $grupo_id_grupo ?>" class="cor text-decoration-none">Entra na conversa</a>
            </div>

        </article>
        <?php }
            mysqli_stmt_close($stmt);
        }
        mysqli_close($link);


        ?>
    </section>
</main>