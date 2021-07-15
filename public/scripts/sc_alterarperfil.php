<?php

require_once ("../connections/connection.php");

if (isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
}


session_start();

// UPDATE NOME
if ((isset($_POST["nome_user"]) && (isset($_POST["email_user"])) && (isset($_POST["descricao_users"])) && ($_POST["nome_user"] != "")) && (isset($_SESSION["id"]))) {
    $nome = $_POST["nome_user"];
    $email = $_POST["email_user"];
    $descricao = $_POST["descricao_users"];

    $id = $_SESSION["id"];

    // Create a new DB connection
    $link = new_db_connection();

    /* create a prepared statement */
    $stmt = mysqli_stmt_init($link);

    $query = "UPDATE users
SET nome_users = ?, email_users = ?, descricao_users = ? WHERE id_users = ?";
    if (mysqli_stmt_prepare($stmt, $query)) {
        /* Bind paramenters */
        mysqli_stmt_bind_param($stmt, "sssi", $nome, $email, $descricao,  $id);
        /* execute the prepared statement */
        if (!mysqli_stmt_execute($stmt)) {
            echo "Error:" . mysqli_stmt_error($stmt);
        }
        header("Location: ../perfil.php");
        /* close statement */
        mysqli_stmt_close($stmt);
    } else {
        echo("Error description: " . mysqli_error($link));
    }
    /* close connection */
    mysqli_close($link);
} else {
    echo "FALTAM VALORES";
}

