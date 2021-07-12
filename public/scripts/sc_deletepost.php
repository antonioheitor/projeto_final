<?php
require_once "../connections/connection.php";

if (isset($_GET['post'])) {
    $post = $_GET['post'];
}

$link = new_db_connection();

$stmt = mysqli_stmt_init($link);

$query = "DELETE FROM posts WHERE id_posts= ?";

if (mysqli_stmt_prepare($stmt, $query)) {
    /* Bind paramenters */
    mysqli_stmt_bind_param($stmt, "i", $post);
    /* execute the prepared statement */
    if (!mysqli_stmt_execute($stmt)) {
        echo "Error:" . mysqli_stmt_error($stmt);
    }
    /* close statement */
    mysqli_stmt_close($stmt);
} else {
    echo("Error description: " . mysqli_error($link));
}
mysqli_close($link);

?>

