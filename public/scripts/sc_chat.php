<?php
require_once "../connections/connection.php";
session_start();

if (isset($_GET["sms"])) {
    $grupo_id_grupo = $_GET["sms"];
}

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
}

if (isset($_POST["sms"]) ) {
    $mensagem = $_POST['sms'];

    $link = new_db_connection();

    $stmt = mysqli_stmt_init($link);

    $query = "INSERT INTO mensagens (mensagem_chat, imagem_chat, grupo_id_grupo, users_id_users, data_msg) VALUES (?, NULL, ?, ?, CURRENT_TIMESTAMP)";

    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_bind_param($stmt, 'sii', $mensagem, $grupo_id_grupo, $id);

        // Devemos validar também o resultado do execute!
        if (mysqli_stmt_execute($stmt)) {
            // Acção de sucesso

        } else {
            // Acção de erro

            echo $mensagem;
            echo $grupo_id_grupo;
            echo $id;
        }
    } else {
        // Acção de erro

    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);
} else {
    echo "Campos do formulário por preencher";
}

