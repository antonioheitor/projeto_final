<?php
require_once "../connections/connection.php";
session_start();

if (isset($_SESSION['id']) && isset($_GET['voto'])) {
    $user = $_SESSION['id'];
    $user_votado = $_GET['voto'];


}