<?php
require_once "../connections/connection.php";

if (isset($_POST["email_users"]) && isset($_POST["password"]) ) {
    $email_users = $_POST['email_users'];
    $password = $_POST['password'];

    $link = new_db_connection();

    $stmt = mysqli_stmt_init($link);

    $query = "SELECT id_users, nome_users ,password_hash, roles_plataforma_id_roles_plataforma FROM users WHERE email_users LIKE ?";

    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_bind_param($stmt, 's', $email_users);

        if (mysqli_stmt_execute($stmt)) {

            mysqli_stmt_bind_result($stmt ,$id_utilizador, $nome_users, $password_hash, $perfil);

            if (mysqli_stmt_fetch($stmt)) {
                if (password_verify($password, $password_hash)) {
                    // Guardar sessão de utilizador
                    session_start();

                    $_SESSION["id"] = $id_utilizador;
                    $_SESSION["nome"] = $nome_users;
                    $_SESSION["role"] = $perfil;
                    // Feedback de sucesso
                    header("Location: ../homepage.php");
                } else {
                    // Password está errada
                    header("Location: ../login.php?msg=2#login");;
                }
            } else {
                // Username não existe
                header("Location: ../login.php?msg=2#login");
            }
        } else {
            // Acção de erro
            echo "Error:" . mysqli_stmt_error($stmt);
        }
    } else {
        // Acção de erro
        echo "Error:" . mysqli_error($link);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);

}else {
    echo "Campos do formulário por preencher";
}



?>