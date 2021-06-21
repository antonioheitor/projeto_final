<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta content="Antonio, Joana, Juliana e Mariana" name="author">
    <meta content="CBL" name="keywords">
    <meta content="Hi-Tribe" name="description">

    <!-- Bootstrap CSS -->
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/fontawesome-free/css/all.css">

    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

    <title>Index - Register</title>
</head>
<body>
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

    <section class="row justify-content-center mt-5">
        <div class="col-10">
            <form method="post" role="form" id="register-form" action="scripts/sc_registo.php" enctype="multipart/form-data">
                <div class="form-group rounded">
                    <input type="text" aria-describedby="name" name="nome_user" placeholder="Nome">
                </div>
                <div class="form-group rounded">
                    <input type="email" class="inputs" aria-describedby="email" name="email_user"  placeholder="Email">
                </div>

                <div class="form-group rounded">
                    <input type="password" class="inputs" aria-describedby="password" name="password_user" placeholder="Palavra-Passe">
                </div>
                <div class="form-group rounded">
                    <input type="text" class="inputs inputdescricao" aria-describedby="description" name="descricao_users" placeholder="Descrição">
                </div>
                <div class="form-group rounded bg-light pb-4">
                    <p class="px-3 pt-3">Faz upload da tua foto de perfil!</p>
                <input type="file" class="form-control w-50 mx-auto border-0 bg-light" name="fileToUpload" id="customFile"/>
                </div>
                <div class="row justify-content-center mb-5 mt-2">
                    <button class="btnlogin w-50 text-center col-4" data-dismiss="modal" type="submit">
                    <a href="login.php" class="text-white text-decoration-none">Entrar</a>
                    </button>
                </div>
            </form>
        </div>
    </section>



</main>

</body>
</html>