<?php require_once("../connections/connection.php");

$link = new_db_connection();

$stmt = mysqli_stmt_init($link);

$query = "SELECT temas.id_temas, temas.nome_tema, areas.id_areas FROM temas
INNER JOIN areas
WHERE temas.areas_id_areas = areas.id_areas;";

if (isset($_GET["search_users"])) {
$query = $query . " WHERE users.username LIKE ?";
}


if (mysqli_stmt_prepare($stmt, $query)) {
if (isset($_GET['search_users'])) {
$procura = "%" . $_GET['search_users'] . "%";
mysqli_stmt_bind_param($stmt, 's', $procura);
}
mysqli_stmt_execute($stmt);

mysqli_stmt_bind_result($stmt, $id, $email, $user, $data, $role);
}

?>

<main class="container-fluid mt-lg-5">
    <section class="row justify-content-center pt-3 mb-3">
        <form class="col-11 mt-lg-4">
            <input type="text" id="procura" class="shadow-sm" name="procura" placeholder="Desporto">
        </form>
    </section>
    <div class="galeria row mx-auto mb-5">
        <div class="col-6 col-md-4 col-lg-3 mb-2">
            <a href="cp_perfiltribo.php">
                <img src="images/futebol.jpg" class="img-fluid m-2 redondo shadow">
                <h4 class="text-center ml-2">Futebol</h4>
            </a>
        </div>
    </div>
</main>
