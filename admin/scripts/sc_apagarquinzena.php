<?php
require_once "../connections/connection.php";

$link = new_db_connection();

$stmt = mysqli_stmt_init($link);
$query = "SELECT id_quinzena FROM quinzenas ORDER BY id_quinzena ASC LIMIT 1";

if (mysqli_stmt_prepare($stmt, $query)) {
    //Devemos validar também o resultado do execute!
    if (mysqli_stmt_execute($stmt)) {
        //Ação de sucesso
        mysqli_stmt_bind_result($stmt, $quinzena);
        while (mysqli_stmt_fetch($stmt)){
        }

    } else {
        //Ação de erro
        echo "Error:" . mysqli_error($link);
    }
} else {
    echo "Error:" . mysqli_error($link);
}
mysqli_stmt_close($stmt);


$stmt = mysqli_stmt_init($link);
$stmt1 = mysqli_stmt_init($link);

$query = "DELETE FROM votos WHERE quinzenas_id_quinzena = ?";
$query1 = "DELETE FROM quinzenas WHERE id_quinzena = ?";

//QUERY
if (mysqli_stmt_prepare($stmt, $query)) {
    mysqli_stmt_bind_param($stmt, 'i', $quinzena);

    if (mysqli_stmt_execute($stmt)) {


//QUERY1
        if (mysqli_stmt_prepare($stmt1, $query1)) {
            mysqli_stmt_bind_param($stmt1, 'i', $quinzena);

            if (mysqli_stmt_execute($stmt1)) {
                header("Location: ../../admin/index.php");
            } else {

            }
        } else {

        }
        mysqli_stmt_close($stmt1);

    } else {
        //Ação de erro

    }
} else {

}

mysqli_stmt_close($stmt);

mysqli_close($link);

