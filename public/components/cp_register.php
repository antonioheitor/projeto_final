<main class="container-fluid">
    <section class="row justify-content-center mt-5">
        <img src="images/logo.png" alt="">
    </section>

    <section class="row justify-content-center">
        <h1>Hi-Tribe</h1>
    </section>

    <section class="row justify-content-center pt-3">
        <p>Um mundo de tudo e de todos, esta é a tua tribo!</p>
    </section>
<section class="justify-content-center">
    <?php
    if (isset($_GET["msg"])) {
        $msg_show = true;
        switch ($_GET["msg"]) {
            case 0:
                $message = "Ocorreu um erro no registo";
                $class="alert-warning";
                break;
            case 1:
                $message = "Registo efectuado com sucesso";
                $class="alert-success";
                break;
            case 2:
                $message = "Ocorreu um erro no login";
                $class="alert-warning";
                break;
            case 3:
                $message = "Login efectuado com sucesso";
                $class="alert-success";
                break;
            default:
                $msg_show = false;
        }

        echo "<div class=\"alert $class alert-dismissible fade show\" role=\"alert\">
" . $message . "
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
    <span aria-hidden=\"true\">&times;</span>
  </button>
</div>";
        if ($msg_show) {
            echo '<script>window.onload=function (){$(\'.alert\').alert();}</script>';
        }
    }
    ?>
</section>
    <section class="row justify-content-center mt-5">
        <div class="col-10">
            <form method="post" role="form" id="register-form" action="scripts/sc_registo.php" enctype="multipart/form-data">
                <div class="form-group rounded">
                    <input type="text" aria-describedby="name" name="nome_user" placeholder="Nome">
                </div>
                <div class="form-group rounded">
                    <input type="email" class="inputs form-control" aria-describedby="email" name="email_user" placeholder="Email" required="required" onchange="email_validate(this.value);">
                </div>

                <div class="form-group rounded">
                    <input type="password" class="inputs form-control" aria-describedby="password" id="password" name="password_user" placeholder="Palavra-Passe" required="required" onkeyup="checkPass(); return false;">
                </div>
                <div class="form-group rounded">
                    <input type="password" class="inputs form-control" aria-describedby="password" id="password_confirm" name="verify_password" placeholder="Verificação" required="required" onkeyup="checkPass(); return false;">
                </div>
                <span id="confirmMessage" class="confirmMessage"></span>
                <div class="form-group rounded">
                    <input type="text" class="inputs inputdescricao" aria-describedby="description" name="descricao_users" placeholder="Descrição">
                </div>
                <div class="form-group rounded bg-light pb-4">
                    <p class="px-3 pt-3">Faz upload da tua foto de perfil!</p>
                    <input type="file" class="form-control w-50 mx-auto border-0 bg-light" name="imgperfil"
                           id="customFile"/>
                </div>
                <div class="row justify-content-center mt-3">
                    <button class="btnlogin py-3 text-center col-4" data-dismiss="modal" type="submit">Submeter Dados</button>
                </div>

                <div class="row justify-content-center mb-5 mt-3">
                    <button class="btnlogin py-3 text-center col-4" data-dismiss="modal">
                        <a href="login.php" class="text-white text-decoration-none">Já tens conta?</a>
                    </button>
                </div>
            </form>
        </div>
    </section>
</main>
