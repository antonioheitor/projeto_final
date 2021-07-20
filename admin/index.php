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

    <title>Homepage Admin</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

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

                    <!-- Topbar Search -->
                    <form action="index.php" method="get" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" id="procurar"
                                   name="procurar" placeholder="Search for..."
                                   aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" value="pesquisa" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class=" pr-4">
                                            Nova Tribo

                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300 pr-3"></i>
                                            <a href="tribos_new.php"><div class="btn btn-dark">Criar</div></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class=" pr-4">
                                            Novo Tema

                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-atlas fa-2x text-gray-300 pr-4"></i>
                                            <a href="temas_new.php"><div class="btn btn-dark">Criar</div></a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="pr-4">
                                            Nova Sede

                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-map-marker-alt fa-2x text-gray-300 pr-4"></i>
                                            <a href="sedes_new.php"><div class="btn btn-dark">Criar</div></a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class=" px-4">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Votações</div>
<?php
require_once "connections/connection.php";


                        $link = new_db_connection();

                        $stmt = mysqli_stmt_init($link);

                        $query = "SELECT COUNT(id_grupo) FROM grupo;";


                        if (mysqli_stmt_prepare($stmt, $query)) {


                        if (mysqli_stmt_execute($stmt)) {

                        mysqli_stmt_bind_result($stmt, $contagem_grupo );

                        if (!mysqli_stmt_fetch($stmt)) {

                        header("Location: users.php");

                        }
                        echo "<div class='h5 mb-0 font-weight-bold text-gray-800'>$contagem_grupo</div>";

                        } else {

                        }
                        //mostrar o codigo a apresentar
                        } else {

                        echo "ERRORRRRR: " . mysqli_error($link);
                        }
                        mysqli_stmt_close($stmt);

                        ?>

                                        </div>
                                        <div class="col-auto">
                                            <i class="fas pr-4 fa-comments fa-2x text-gray-300"></i>
                                            <a href="votacoes.php"><div class="btn btn-dark">Aceitar</div></a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Info Usuários</h6>
                                    <div class="dropdown no-arrow">
                                    </div>
                                </div>
                                <div class="card-body">


                                <?php



                                $stmt = mysqli_stmt_init($link);

                                $query = "SELECT COUNT(roles_plataforma_id_roles_plataforma) FROM users WHERE roles_plataforma_id_roles_plataforma = 3;";


                                if (mysqli_stmt_prepare($stmt, $query)) {


                                    if (mysqli_stmt_execute($stmt)) {

                                        mysqli_stmt_bind_result($stmt, $roles_admin );

                                        if (!mysqli_stmt_fetch($stmt)) {

                                            header("Location: users.php");

                                        }
                                        echo "<div class='pb-4'>
                                    <section class='btn btn-primary'>
                                    <p>Quantidade: $roles_admin</p>
</section>
                                </div>";

                                    } else {

                                    }
                                    //mostrar o codigo a apresentar
                                } else {

                                    echo "ERRORRRRR: " . mysqli_error($link);
                                }
                                mysqli_stmt_close($stmt);




                    $stmt = mysqli_stmt_init($link);

                    $query = "SELECT COUNT(roles_grupos_id_roles) FROM users_has_grupo WHERE roles_grupos_id_roles = 1;";


                    if (mysqli_stmt_prepare($stmt, $query)) {


                       if (mysqli_stmt_execute($stmt)) {

                        mysqli_stmt_bind_result($stmt, $roles_lider );

                        if (!mysqli_stmt_fetch($stmt)) {

                            header("Location: users.php");

                        }
                           echo "<div class='pb-4'>
                                    <section class='btn btn-success'>
                                    <p>Quantidade: $roles_lider</p>
</section>
                                </div>";

                    } else {

                       }
                        //mostrar o codigo a apresentar
                    } else {

                        echo "ERRORRRRR: " . mysqli_error($link);
                    }
                    mysqli_stmt_close($stmt);


                     $stmt = mysqli_stmt_init($link);

                                    $query = "SELECT COUNT(roles_grupos_id_roles) FROM users_has_grupo WHERE roles_grupos_id_roles = 6;";


                                    if (mysqli_stmt_prepare($stmt, $query)) {


                                    if (mysqli_stmt_execute($stmt)) {

                                    mysqli_stmt_bind_result($stmt, $roles_membro );

                                    if (!mysqli_stmt_fetch($stmt)) {

                                    header("Location: users.php");

                                    }
                                    echo "<div class='pb-4'>
                                        <section class='btn btn-info'>
                                            <p>Quantidade: $roles_membro</p>
                                        </section>
                                    </div>";

                                    } else {

                                    }
                                    //mostrar o codigo a apresentar
                                    } else {

                                    echo "ERRORRRRR: " . mysqli_error($link);
                                    }
                                    mysqli_stmt_close($stmt);

                                    ?>


                                <!-- Card Body -->


                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Admin
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Líderes
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Membros
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

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
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>