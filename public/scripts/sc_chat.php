<?php
require_once "../connections/connection.php";
if (isset($_GET["chat"])) {
    $grupo_id_grupo = $_GET["chat"];
}

if (isset($_POST["sms"]) ) {
    $mensagem = $_POST['sms'];

    $link = new_db_connection();

    $stmt = mysqli_stmt_init($link);

    $query = "INSERT INTO mensagens (mensagem_chat, grupo_id_grupo, users_id_users, data_msg) VALUES (?, ?, ?, CURRENT_TIMESTAMP)";

    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_bind_param($stmt, 'sii', $mensagem, $grupo_id_grupo, $_SESSION['id'] );

        // Devemos validar também o resultado do execute!
        if (mysqli_stmt_execute($stmt)) {
            // Acção de sucesso
            header("Location: ../chat.php");
        } else {
            // Acção de erro
            header("Location: ../chat.php?msg=0#login");
            echo "Error:" . mysqli_stmt_error($stmt);
        }
    } else {
        // Acção de erro
        echo "<p>erro2</p>";
        header("Location: ../chat.php?msg=0#login");
        echo "Error:" . mysqli_error($link);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);
} else {
    echo "Campos do formulário por preencher";
}

