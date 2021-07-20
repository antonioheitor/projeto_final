<?php
require_once "connections/connection.php";
session_start();

if (isset($_GET["chat"])) {
    $grupo_id_grupo = $_GET["chat"];
}

$link = new_db_connection();

$stmt1 = mysqli_stmt_init($link);
$query1 = "SELECT grupo.nome_grupo, grupo.id_grupo FROM grupo WHERE grupo.id_grupo = ?";

if (mysqli_stmt_prepare($stmt1, $query1)) {
    mysqli_stmt_bind_param($stmt1, 'i', $grupo_id_grupo);

    mysqli_stmt_execute($stmt1);

    mysqli_stmt_bind_result($stmt1, $nome_grupo, $grupo_id_grupo);
    if (!mysqli_stmt_fetch($stmt1)) {
        header('Location: chat.php');
    }
}
mysqli_stmt_close($stmt1);

$stmt2 = mysqli_stmt_init($link);
$query2 = "SELECT mensagens.mensagem_chat, mensagens.imagem_chat, mensagens.data_msg, grupo.id_grupo, users.nome_users, users.imagem_user, users.id_users FROM mensagens
INNER JOIN users 
ON users.id_users = mensagens.users_id_users
INNER JOIN grupo
ON grupo.id_grupo = mensagens.grupo_id_grupo
WHERE grupo_id_grupo = ?
ORDER BY mensagens.data_msg ASC";

if (mysqli_stmt_prepare($stmt2, $query2)) {
    mysqli_stmt_bind_param($stmt2, 'i', $grupo_id_grupo);

    mysqli_stmt_execute($stmt2);

    mysqli_stmt_bind_result($stmt2, $mensagem,$imagem_chat, $data, $grupo_id_grupo, $user, $avatar, $id_user);


?>

<main class="container-fluid background">
    <section class="row sticky-top">
        <div class="col-12 text-center background">
            <a id="fechar" href="conversas.php" class="float-right pt-4 pr-4"><i class="fas fa-times fa-2x"></i></a>
            <p class="pt-5 pb-1 d-md-block d-none h"><?= $nome_grupo ?></p>
            <p class="pt-5 pb-1 d-md-none h_pequeno"><?= $nome_grupo ?></p>
        </div>
    </section>

    <section class="mb-4">
    <?php
    while (mysqli_stmt_fetch($stmt2)) {

        ?>
        <?php
        if ($id_user == $_SESSION['id']) {
            ?>
            <article class="d-flex justify-content-end mt-4">
                <div class="mensagem border border-dark rounded bg-light">
                    <?php if ($mensagem != null) { ?>
                        <p class="text-dark"><?= $mensagem ?></p>
                    <?php } else { ?>

                        <img class= "img-fluid" src="uploads/<?= $imagem_chat ?>">

                    <?php  }?>
                </div>
            </article>
            <?php
        } else {
            ?>
            <section class="row mt-4">
                <article class="col-12">
                    <img src="uploads/<?= $avatar ?>" class="avatar d-none d-md-block">
                    <div class="row ml-2">
                        <div class="col-10 col-lg-11 border border-dark rounded position-relative msgenviada">
                            <h4 class="pt-3 text-light"><?= $user ?></h4>

                            <?php if ($mensagem != null) { ?>
                            <p class="text-light"><?= $mensagem ?></p>
                <?php } else { ?>

                                <img src="uploads/<?= $imagem_chat ?>" class="img-fluid">

                          <?php  }?>
                        </div>
                    </div>

                </article>
            </section>

    </section>
    <section class="row fixed-bottom bg-light mt-md-5">
        <div class="col-12">
            <div class="row">
                <div class="col-10 col-md-11 pl-4">
                    <form class="py-2" method="post" enctype="multipart/form-data" role="form" id="chat" action="scripts/sc_chat.php?chat=<?=$grupo_id_grupo?>">
                        <div class="row ml-2">
                            <input type="text" id="mensagem" name="mensagem" placeholder="Mensagem..." class="col-11">
                            <button type="submit" class="ml-xl-5 btn btn-outline-none p-0"><i class="far fa-paper-plane fa-1x pl-1"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col-2 col-md-1 my-auto text-center">
                    <i class="fas fa-plus-circle fa-1x pt-2 mr-xl-5" data-toggle="modal" data-target="#modal"></i>
                    <i class="fas fa-microphone fa-1x pt-2 mx-xl-2"></i>
                </div>
            </div>

        </div>
    </section>


    <!-- ADD FOTO -->
    <div class="modal show margemmodal" id="modal">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <!-- CONTEÚDO DO MODAL ######################### -->
            <div class="modal-content bg-white text-dark bordermodal">
                <!-- CABEÇALHO DO MODAL ######################### -->
                <div class="modal-header mx-auto">
                    <h3 class="text-center pt-3">Seleciona imagem</h3>
                    <button class="close ptt" data-dismiss="modal" type="button">&times;</button>
                </div>
                <form method="post" role="form" id="post-form" action="scripts/sc_chat.php?chat=<?=$grupo_id_grupo?>"
                      enctype="multipart/form-data">
                    <div class="modal-body text-center">
                        <input type="file" class="form-control w-50 mx-auto bg-light border-0" name="fotomsg"
                               id="fotomsg"/>
                    </div>
                    <div class="row justify-content-center">
                        <button class="btnlogin w-50 text-center" type="submit">
                            Enviar
                        </button>
                    </div>
                </form>
                <!-- BOTÃO QUE FECHA O MODAL ######################### -->

                <!-- CORPO DO MODAL ######################### -->
                <div class="modal-body mx-auto text-center bgdark">
                </div>
                <!-- RODAPÉ DO MODAL ######################### -->
                <div class="modal-footer">
                    <p class="small mx-auto">Hi-Tribe</p>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    }
    mysqli_stmt_close($stmt2);
    }

    mysqli_close($link);

    ?>

</main>