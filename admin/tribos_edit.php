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
                    <h1 class="h3 mb-2 text-gray-800">Edição da Lista de Tribos</h1>
                    <p class="mb-4">Aqui pode-se encontrar todas as informações acerca das tribos registadas.</p>
                    <?php

                    require_once "connections/connection.php";

                    if (isset($_GET["id"])) {
                        $id_grupo = $_GET["id"];
                    }


                    $link = new_db_connection();

                    $stmt = mysqli_stmt_init($link);

                    $query = "SELECT id_grupo, nome_grupo, descricao_grupo, imagem_grupo, sedes_id_sede_grupo, nome_sede, temas_id_temas, nome_tema FROM grupo INNER JOIN sedes ON id_sede_grupo = sedes_id_sede_grupo INNER JOIN temas ON id_temas = temas_id_temas WHERE id_grupo = ?";


                    if (mysqli_stmt_prepare($stmt, $query)) {


                        mysqli_stmt_bind_param($stmt, 'i', $id_grupo);

                       if (mysqli_stmt_execute($stmt)) {

                        mysqli_stmt_bind_result($stmt, $id_grupo, $nome_grupo, $descricao_grupo, $imagem_grupo, $sedes_id_sede_grupo, $nome_sede, $temas_id_temas, $nome_tema);

                        if (!mysqli_stmt_fetch($stmt)) {

                            header("Location: users.php");

                        }

                        $_SESSION["id_grupo"] = $id_grupo;

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
                                    Edição de Tribos
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <form role="form" method="post" action="scripts/sc_update_tribos.php">
                                        <input type="hidden" name="id_grupo" value='<?= $id_grupo ?>'>
                                        <div class="form-group">
                                            <label>ID da Tribo</label>
                                            <p class="form-control-static"><?= $id_grupo ?></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Nome</label>
                                            <input class="form-control" name="nome" type="text" value="<?= $nome_grupo ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Descrição</label>
                                            <input class="form-control" type="text" name="descricao" value="<?= $descricao_grupo ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Imagem</label>
                                            <input class="form-control" type="text" name="imagem" value="<?= $imagem_grupo ?>">
                                        </div>
                                        <div class="form-group">
                                                <label>Sede</label>
                                            <select class="form-control" name="sedes_id_sede_grupo">
                                                <?php

                                                $stmt = mysqli_stmt_init($link);

                                                $query = "SELECT id_sede_grupo, nome_sede FROM sedes ORDER BY nome_sede";


                                                if (mysqli_stmt_prepare($stmt, $query)) {


                                                    mysqli_stmt_execute($stmt);

                                                    mysqli_stmt_bind_result($stmt, $id_sede_grupo, $nome_sede);


                                                    while (mysqli_stmt_fetch($stmt)) {
                                                        $selected1 = "";
                                                        if ($sedes_id_sede_grupo == $id_sede_grupo) {
                                                            $selected1 = "selected";
                                                        }

                                                        echo "<option value='$id_sede_grupo' $selected1>$nome_sede</option>";
                                                    }


                                                } else {

                                                    echo "ERRORRRRR: " . mysqli_error($link);
                                                }
                                                //close connection

                                                mysqli_stmt_close($stmt);



                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tema</label>
                                            <select class="form-control" name="temas_id_temas">
                                                <?php

                                                $stmt = mysqli_stmt_init($link);

                                                $query = "SELECT id_temas, nome_tema FROM temas ORDER BY nome_tema";


                                                if (mysqli_stmt_prepare($stmt, $query)) {


                                                    mysqli_stmt_execute($stmt);

                                                    mysqli_stmt_bind_result($stmt, $id_temas, $nome_tema);


                                                    while (mysqli_stmt_fetch($stmt)) {
                                                        $selected2 = "";
                                                        if ($temas_id_temas == $id_temas) {
                                                            $selected2 = "selected";
                                                        }

                                                        echo "<option value='$id_temas' $selected2>$nome_tema</option>";
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