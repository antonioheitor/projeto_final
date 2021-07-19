
<?php

session_start();

if (isset($_SESSION["role"]) && ($_SESSION["role"] == 4) || ($_SESSION["role"] == null)) {


    header('Location: ../public/homepage.php');


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

    <title>Sedes Admin</title>

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
                <?php

                include_once "components/cp_navbar_topo.php";

                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->

                            <h1 class="h3 mb-2 text-gray-800">Sedes</h1>
                        <p class="mb-4">Aqui pode-se encontrar todas as informações sobre as sedes criadas.</p>
                    <?php

                    require_once "connections/connection.php";


                    $link = new_db_connection();

                    $stmt = mysqli_stmt_init($link);

                    $query = "SELECT id_sede_grupo, nome_sede, latitude_sede, longitude_sede FROM sedes";


                    if (mysqli_stmt_prepare($stmt, $query)) {


                        mysqli_stmt_execute($stmt);

                        mysqli_stmt_bind_result($stmt, $id_sede_grupo, $nome_sede, $latitude_sede, $longitude_sede);


                    } else {

                        echo "ERRORRRRR: " . mysqli_error($link);
                    }
                    ?>

                    <!-- Content Row -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Sedes</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome da Sede</th>
                                        <th>Latitude da Sede</th>
                                        <th>Longitude da Sede</th>
                                        <th>Editar</th>
                                    </tr>
                                    </thead>
                                    <?php

                                    while (mysqli_stmt_fetch($stmt)) {
                                    ?>
                                    <tbody>
                                    <tr>
                                        <td><?= $id_sede_grupo ?></td>
                                        <td><?= $nome_sede ?></td>
                                        <td><?= $latitude_sede ?></td>
                                        <td><?= $longitude_sede ?></td>
                                        <td><a href='sedes_edit.php?id=<?= $id_sede_grupo ?>'><i class="fa fa-edit fa-fw"></a></td>
                                    </tr>

                                    </tbody>
                                        <?php
                                    }
                                    mysqli_stmt_close($stmt);
                                    mysqli_close($link);
                                    ?>
                                </table>
                            </div>
                        </div>
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