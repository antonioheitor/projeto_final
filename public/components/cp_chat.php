<?php
require_once "connections/connection.php";

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
        header('Location: sessoes.php');
    }
}
mysqli_stmt_close($stmt1);

$stmt2 = mysqli_stmt_init($link);
$query2 = "SELECT mensagens.mensagem_chat, mensagens.data_msg, grupo.id_grupo, users.nome_users, users.imagem_user FROM mensagens
INNER JOIN users 
ON users.id_users = mensagens.users_id_users
INNER JOIN grupo
ON grupo.id_grupo = mensagens.grupo_id_grupo
WHERE grupo_id_grupo = ?";

if (mysqli_stmt_prepare($stmt2, $query2)) {
    mysqli_stmt_bind_param($stmt2, 'i', $grupo_id_grupo);

    mysqli_stmt_execute($stmt2);

    mysqli_stmt_bind_result($stmt2, $mensagem, $data, $grupo_id_grupo, $user, $avatar);
    if (!mysqli_stmt_fetch($stmt2)) {
        header('Location: sessoes.php');
    }
}

?>

<main class="container-fluid background">
    <section class="row sticky-top">
        <div class="col-12 text-center background">
            <a id="fechar" href="conversas.php" class="float-right pt-4 pr-4"><i class="fas fa-times fa-2x"></i></a>
            <p class="pt-5 pb-1 d-md-block d-none h"><?= $nome_grupo ?></p>
            <p class="pt-5 pb-1 d-md-none h_pequeno"><?= $nome_grupo ?></p>
        </div>
    </section>

    <section class="row mt-4">
        <article class="col-12">
            <?php
            while (mysqli_stmt_fetch($stmt2)) {
                ?>

                <img src="<?= $avatar ?>" class="avatar d-none d-md-block">
                <div class="row ml-2">
                    <div class="col-10 col-lg-11 border border-dark rounded position-relative msgenviada">
                        <h4 class="pt-3 text-light"><?= $user ?></h4>
                        <p class="text-light"><?= $mensagem ?></p>
                    </div>
                </div>
            <?php
            } ?>
        </article>
    </section>




    <!------
     <section class="row mt-4">
         <article class="col-12">
             <img src="images/1.jpeg" class="avatar d-none d-md-block">
             <div class="row ml-2">
                 <div class="col-10 col-lg-11 border border-dark rounded position-relative msgenviada">
                     <h4 class="pt-3 text-light">Diogo Queijo</h4>
                     <p class="text-light">Ahahahaah quantas e quantas vezes xdd tenta mais que vais lá!</p>
                 </div>
             </div>
         </article>
     </section>

     <section class="row mt-4">
         <article class="col-12">
             <img src="images/4.jpg" class="avatar d-none d-md-block">
             <div class="row ml-2">
                 <div class="col-10 col-lg-11 border border-dark rounded position-relative msgenviada">
                     <h4 class="pt-3 text-light">Rafael Graça</h4>
                     <p class="text-light">Demorei bue tempo a fazer esse truque! </p>
                 </div>
             </div>
         </article>
     </section>

     <article class="d-flex justify-content-end mt-4">
         <div class="mensagem border border-dark rounded bg-light">
             <p>AHAHAHAHAHAAH pagava para ter visto isso xdd</p>
         </div>
     </article>

     <section class="row mt-4">
         <article class="col-12">
             <img src="images/2.jpeg" class="avatar d-none d-md-block">
             <div class="row ml-2">
                 <div class="col-10 col-lg-11 border border-dark rounded position-relative msgenviada">
                     <h4 class="pt-3 text-light">Sara Rocha</h4>
                     <p class="text-light">Tu a fazer esse e eu a fazer um boardslide! Já ando há semanas e ainda não
                         saiu perfeito :(</p>
                 </div>
             </div>
         </article>
     </section>

     <section class="row mt-4">
         <article class="col-12">
             <img src="images/5.jpg" class="avatar d-none d-md-block">
             <div class="row ml-2">
                 <div class="col-10 col-lg-11 border border-dark rounded position-relative msgenviada">
                     <h4 class="pt-3 text-light">Béu Furtado</h4>
                     <p class="text-light">Oh malta skatar é nice mas não se partam todos. Não quero ir ver ninguém
                         ao hospital. </p>
                 </div>
             </div>
         </article>
     </section>

     <article class="d-flex justify-content-end mt-4">
         <div class="mensagem border border-dark rounded bg-light">
             <p>kkkkkkk uma vez um vizinho meu no skatepark de Ílhavo partiu-se todo!! Não estão a entender! Todo
                 cheio de sangue, tive de o ver de perto para o reconhecer xdd</p>
         </div>
     </article>

     <section class="row mt-4">
         <article class="col-12">
             <img src="images/4.jpg" class="avatar d-none d-md-block">
             <div class="row ml-2">
                 <div class="col-10 col-lg-11 border border-dark rounded position-relative msgenviada">
                     <h4 class="pt-3 text-light">Diogo Queijo</h4>
                     <p class="text-light">Eia goza??? Coitado!!</p>
                 </div>
             </div>
         </article>
     </section>

     <section class="row mt-4">
         <article class="col-12">
             <img src="images/2.jpeg" class="avatar d-none d-md-block">
             <div class="row ml-2">
                 <div class="col-10 col-lg-11 border border-dark rounded position-relative msgenviada">
                     <h4 class="pt-3 text-light">Ana Pedro</h4>
                     <p class="text-light">Ai nem me digam isso!! Agora até tenho medo!!</p>
                 </div>
             </div>
         </article>
     </section>

     <article class="d-flex justify-content-end mt-4">
         <div class="mensagem border border-dark rounded bg-light">
             <p>Opa nada se consegue sem esforço!! Acho que todos os skaters já se partiram todos alguma vez na vida
                 deles mas continuaram rijos sempre!!</p>
         </div>
     </article>

     <section class="row mt-4 mb-5">
         <article class="col-12 mb-5">
             <img src="images/1.jpeg" class="avatar d-none d-md-block">
             <div class="row ml-2">
                 <div class="col-10 col-lg-11 border border-dark rounded position-relative msgenviada">
                     <h4 class="pt-3 text-light">Diva Martins</h4>
                     <p class="text-light">Grandes conquistas são compostas de uma serie de pequenas vitórias ;)</p>
                 </div>
             </div>
         </article>
     </section>
 --->
    <section class="row fixed-bottom bg-light">
        <div class="col-12">
            <div class="row">
                <div class="col-9 col-md-10 pl-4">
                    <form class="py-2">
                        <input type="text" id="sms" name="sms" placeholder="Mensagem...">
                    </form>
                </div>
                <div class="col-3 col-md-2 my-auto text-center">
                    <i class="fas fa-plus-circle fa-2x pt-2 mx-1"></i>
                    <i class="fas fa-microphone fa-2x pt-2 mx-1"></i>
                </div>
            </div>

        </div>


    </section>

</main>