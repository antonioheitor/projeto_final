<?php
require_once "connections/connection.php";

if (isset($_SESSION["id"])) {
    $user_id = $_SESSION["id"];
}

$link = new_db_connection();

$stmt = mysqli_stmt_init($link);
$query = "SELECT users.nome_users, users.imagem_user, users.id_users FROM users WHERE users.id_users = ?";

if (mysqli_stmt_prepare($stmt, $query)) {

mysqli_stmt_bind_param($stmt, 'i', $user_id);
mysqli_stmt_execute($stmt);

mysqli_stmt_bind_result($stmt, $nome, $imagem, $user_id);

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
    <?php
    while (mysqli_stmt_fetch($stmt)) {
        ?>
        <section class="row no-gutters">
            <article class="col-12 text-center">
                <img class="rounded-circle perfil" src="<?= $imagem; ?>">
            </article>
        </section>

        <article class="col-12 text-center mb-5">
            <h1 class="mt-3"><?= $nome ?></h1>
        </article> <?php

    }
    mysqli_stmt_close($stmt);?>

    <section class="row justify-content-center">
        <?php

        $stmt2 = mysqli_stmt_init($link);
        $query2 = "SELECT imagem_grupo, grupo_id_grupo , nome_grupo, temas_id_temas FROM users_has_grupo 
INNER JOIN grupo ON grupo_id_grupo = id_grupo  
WHERE users_id_users = ?";


        if (mysqli_stmt_prepare($stmt2, $query2)) {

            mysqli_stmt_bind_param($stmt2, 'i', $user_id);
            mysqli_stmt_execute($stmt2);

            mysqli_stmt_bind_result($stmt2, $imagem_grupo, $grupo_id_grupo, $nome_grupo, $temas_id_temas);

            while (mysqli_stmt_fetch($stmt2)) { ?>
                <article class="col-6 col-md-4 borda_post text-center mx-5 my-3 shadow">
                    <a href="perfil_tribo.php?grupo=<?= $temas_id_temas ?>">
                    <div class="m-1 m-sm-3">
                        <img src="../uploads/<?= $imagem_grupo ?>" class="img-fluid rounded mt-3">
                        <h5 class="mt-2"><?= $nome_grupo ?></h5>

                    </div>
                    </a>
                    <a href="chat.php?chat=<?= $grupo_id_grupo ?>" class="cor text-decoration-none">Entra na
                        conversa</a>
                </article>
            <?php }
            mysqli_stmt_close($stmt2);
        }
        mysqli_close($link);


        ?>
    </section>
</main>
<?php }?>