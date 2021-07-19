
<?php

session_start();

require_once "../connections/connection.php";

if (isset($_POST["nome_sede"]) && isset($_POST["latitude_sede"]) && isset($_POST["longitude_sede"]) ) {
$nome_sede = $_POST['nome_sede'];
$latitude_sede = $_POST['latitude_sede'];
$longitude_sede = $_POST['longitude_sede'];

$link = new_db_connection();

$stmt = mysqli_stmt_init($link);

$query = "INSERT INTO sedes (nome_sede, latitude_sede, longitude_sede ) VALUES (?,?,?)";

if (mysqli_stmt_prepare($stmt, $query)) {
mysqli_stmt_bind_param($stmt, 'sii', $nome_sede, $latitude_sede, $longitude_sede);

// Devemos validar também o resultado do execute!
if (mysqli_stmt_execute($stmt)) {
// Acção de sucesso
header("Location: ../sedes.php");
} else {
// Acção de erro
header("Location: ../sedes_edit.php");
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

