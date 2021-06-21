
<?php

session_start();

if (isset($_SESSION["role"]) && ($_SESSION["role"] == 2) || ($_SESSION["role"] == null)) {


    header('Location: ../public/index.php');


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

    <title>Peças Admin</title>

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

                        <h1 class="h3 mb-2 text-gray-800">Peças</h1>
                        <p class="mb-4">Aqui pode-se encontrar todas as informações acerca das peças no website MAAC.</p>
                    <?php

                    require_once "connections/connection.php";


                    $link = new_db_connection();

                    $stmt = mysqli_stmt_init($link);

                    $query = "SELECT id_pecas, nome_peca, descricao_peca, ano_peca, imagem_peca, exposicoes_id_exposicoes, nome_exposicao FROM pecas INNER JOIN exposicoes 
ON exposicoes_id_exposicoes = id_exposicoes";


                    if (mysqli_stmt_prepare($stmt, $query)) {


                        //mysqli_stmt_bind_param($stmt, 'i', $id_pecas);

                        mysqli_stmt_execute($stmt);

                        mysqli_stmt_bind_result($stmt, $id_pecas, $nome_peca, $descricao_peca, $ano_peca, $imagem_peca, $exposicoes_id_exposicoes, $nome_exposicao);


                    } else {

                        echo "ERRORRRRR: " . mysqli_error($link);
                    }
                    ?>

                    <!-- Content Row -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Peças</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome Peça</th>
                                        <th>Descrição</th>
                                        <th>Ano</th>
                                        <th>Imagem</th>
                                        <th>Exposição a que pertence</th>
                                        <th>Editar</th>
                                    </tr>
                                    </thead>
                                    <?php

                                    while (mysqli_stmt_fetch($stmt)) {
                                    ?>
                                    <tbody>
                                    <tr>
                                        <td><?= $id_pecas ?></td>
                                        <td><?= $nome_peca ?></td>
                                        <td><?= $descricao_peca ?></td>
                                        <td><?= $ano_peca ?></td>
                                        <td><?= $imagem_peca ?></td>
                                        <td><?= $nome_exposicao ?></td>
                                        <td><a href='pecas_edit.php?id=<?= $id_pecas ?>'><i class="fa fa-edit fa-fw"></a></td>
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