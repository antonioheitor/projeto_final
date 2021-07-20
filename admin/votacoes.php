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

    <title>Tribos Edição</title>

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
            <?php

            include_once "components/cp_navbar_topo.php";

            ?>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Contagem das votações</h1>

                <!-- DataTales Example -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading mb-4">
                                Painel de Tribos
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <?php

                                require_once "connections/connection.php";


                                $link = new_db_connection();

                                $stmt = mysqli_stmt_init($link);

                                $query = "SELECT id_grupo, nome_grupo FROM grupo";

                                if (mysqli_stmt_prepare($stmt, $query)) {


                                    mysqli_stmt_execute($stmt);

                                    mysqli_stmt_bind_result($stmt, $id_grupo, $nome_grupo);


                                } else {

                                    echo "ERRORRRRR: " . mysqli_error($link);
                                }
                                ?>

                                <?php

                                while (mysqli_stmt_fetch($stmt)) {
                                ?>

                                    <div class="pb-3">
                                        <section><?= $nome_grupo?></section>
                                        <a class="btn btn-success" href="scripts/sc_contagem_lider.php">Líder</a>
                                        <a class="btn btn-danger" href="scripts/sc_contagem_mestre.php">Mestre</a>

                                    </div>
                                <?php
                    }
                    mysqli_stmt_close($stmt);
?>

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