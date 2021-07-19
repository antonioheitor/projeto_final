<?php
require_once "../connections/connection.php";

if (isset($_GET['post'])) {
    $post = $_GET['post'];
}

$link = new_db_connection();

$stmt = mysqli_stmt_init($link);
$stmt1 = mysqli_stmt_init($link);

$query = "DELETE FROM users_has_posts WHERE users_has_posts.posts_id_posts = ?";
$query1 = "DELETE FROM posts WHERE posts.id_posts = ?";

//QUERY
if (mysqli_stmt_prepare($stmt, $query)) {
    mysqli_stmt_bind_param($stmt, 'i', $post);

    if (mysqli_stmt_execute($stmt)) {


        //QUERY 1
        if (mysqli_stmt_prepare($stmt1, $query1)) {
            mysqli_stmt_bind_param($stmt1, 'i', $post);
            //Devemos validar também o resultado do execute!
            if (mysqli_stmt_execute($stmt1)) {
                //Ação de sucesso
                header("Location: ../homepage.php");
            } else {
                //Ação de erro
                echo "Error:" . mysqli_error($link);
            }
        } else {
            echo "Error:" . mysqli_error($link);
        }
        mysqli_stmt_close($stmt1);


    } else {
        //Ação de erro
        echo "Error:" . mysqli_error($link);
    }
} else {
    echo "Error:" . mysqli_error($link);
}
mysqli_stmt_close($stmt);
mysqli_close($link);

