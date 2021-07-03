<main class="container-fluid pb-5">
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
                    $message = "ocorreu um erro no registo";
                    $class="alert-warning";
                    break;
                case 1:
                    $message = "registo efectuado com sucesso";
                    $class="alert-success";
                    break;
                case 2:
                    $message = "ocorreu um erro no login";
                    $class="alert-warning";
                    break;
                case 3:
                    $message = "login efectuado com sucesso";
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
    <section class="row justify-content-center mt-3">
        <div class="col-10">
            <form method="post" class="justify-content-center" role="form" id="login-form" action="scripts/sc_login.php">
                <div class="form-group rounded text-center">
                    <input type="email" class="px-5 py-3 border-0" aria-describedby="email" name="email_users" placeholder="Email">
                </div>

                <div class="form-group rounded text-center">
                    <input type="password" class="px-5 py-3 border-0" aria-describedby="password" name="password" placeholder="Palavra-Passe">
                </div>
                <section class="row justify-content-center mt-5">
                    <button class="btnlogin py-3 mx-auto text-light mx-auto" type="submit">Entrar</button>
                </section>

                <section class="row justify-content-center pt-3">
                    <button class="btnlogin py-3 mx-auto text-light" type="button"><a href="register.php" class="text-decoration-none text-white">Registar</a></button>
                </section>
            </form>
        </div>
    </section>
</main>
