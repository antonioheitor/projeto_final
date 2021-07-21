<?php

session_start();

if (isset($_SESSION["role"]) && ($_SESSION["role"] == 4) || ($_SESSION["role"] == null)) {


    header('Location: ../public/homepage.php');


}

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




<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Usuários Edição</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php

        include_once "components/cp_navbar.php";

        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                 aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                               placeholder="Search for..." aria-label="Search"
                                               aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->


                        <!-- Nav Item - Messages -->


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $USER_NAME ?></span>
                                <img class="img-profile rounded-circle"
                                     src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                 aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="../public/homepage.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Parte Pública
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../public/scripts/sc_logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Edição da Lista de Utilizadores</h1>
                    <p class="mb-4">Aqui pode-se encontrar todas as informações acerca dos utilizadores registados.</p>
                    <?php

                    require_once "connections/connection.php";

                    if (isset($_GET["id"])) {
                        $id_users = $_GET["id"];
                    }


                    $link = new_db_connection();

                    $stmt = mysqli_stmt_init($link);

                    $query = "SELECT id_users, nome_users, email_users, descricao_users, roles_plataforma_id_roles_plataforma FROM users WHERE id_users = ?";


                    if (mysqli_stmt_prepare($stmt, $query)) {


                        mysqli_stmt_bind_param($stmt, 'i', $id_users);

                       if (mysqli_stmt_execute($stmt)) {

                        mysqli_stmt_bind_result($stmt, $id_users, $nome_users, $email_users, $descricao_users, $roles_plataforma_id_roles_plataforma);

                        if (!mysqli_stmt_fetch($stmt)) {

                            header("Location: users.php");

                        }

                        $_SESSION["id_users"] = $id_users;

                    } else {

                       }
                        //mostrar o codigo a apresentar
                    } else {

                        echo "ERRORRRRR: " . mysqli_error($link);
                    }
                    mysqli_stmt_close($stmt);



                    ?>
                    <!-- DataTales Example -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Edição de utilizador
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <form role="form" method="post" action="scripts/sc_update_users.php">
                                        <input type="hidden" name="id_users" value='<?= $id_users ?>'>
                                        <div class="form-group">
                                            <label>ID do utilizador</label>
                                            <p class="form-control-static"><?= $id_users ?></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input class="form-control" name="username" type="text" value="<?= $nome_users ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" type="email" name="email"
                                                   value="<?= $email_users ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Descrição do User</label>
                                            <input class="form-control" type="text" name="descricao" value="<?= $descricao_users ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Role</label>
                                            <select class="form-control" name="roles_plataforma_id_roles_plataforma">
                                                <?php

                                                $stmt = mysqli_stmt_init($link);

                                                $query = "SELECT id_roles_plataforma, role_plataforma FROM roles_plataforma ORDER BY role_plataforma";


                                                if (mysqli_stmt_prepare($stmt, $query)) {


                                                    mysqli_stmt_execute($stmt);

                                                    mysqli_stmt_bind_result($stmt, $id_roles_plataforma, $role_plataforma);


                                                    while (mysqli_stmt_fetch($stmt)) {
                                                        $selected1 = "";
                                                        if ($roles_plataforma_id_roles_plataforma == $id_roles_plataforma) {
                                                            $selected1 = "selected";
                                                        }

                                                        echo "<option value='$id_roles_plataforma' $selected1>$role_plataforma</option>";
                                                    }


                                                } else {

                                                    echo "ERRORRRRR: " . mysqli_error($link);
                                                }
                                                //close connection

                                                mysqli_stmt_close($stmt);
                                                mysqli_close($link);


                                                ?>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-info">Submeter alterações</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
                <?php

                include_once "components/cp_footer.php";

                ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>