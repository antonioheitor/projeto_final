
<?php

session_start();

require_once "../connections/connection.php";

if (isset($_POST["nome_tema"]) && isset($_POST["areas_id_areas"])  ) {
$nome_tema = $_POST['nome_tema'];
$areas_id_areas = $_POST['areas_id_areas'];


$link = new_db_connection();

$stmt = mysqli_stmt_init($link);

$query = "INSERT INTO temas (nome_tema, areas_id_areas ) VALUES (?,?)";

if (mysqli_stmt_prepare($stmt, $query)) {
mysqli_stmt_bind_param($stmt, 'si', $nome_tema, $areas_id_areas);

// Devemos validar também o resultado do execute!
if (mysqli_stmt_execute($stmt)) {
// Acção de sucesso
header("Location: ../temas.php");
} else {
// Acção de erro
header("Location: ../temas_edit.php");
echo "Error:" . mysqli_stmt_error($stmt);
}
} else {
// Acção de erro
header("Location: ../index.php");
echo "Error:" . mysqli_error($link);
}
mysqli_stmt_close($stmt);
mysqli_close($link);
} else {
echo "Campos do formulário por preencher";
}

