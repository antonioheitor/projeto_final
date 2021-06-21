<?php

session_start();




if (isset($_SESSION["role"]) && ($_SESSION["role"] == 2)) {


        header('Location: ../../public/index.php');


    }
header("Location: ../admin/index.php");
