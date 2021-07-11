<?php

session_start();
if (!isset($_SESSION["id"])) {

    header('Location: login.php');

}
?>

<nav class="fixed-bottom navbar-expand navbar-dark py-2 d-lg-none nav_baixo">
    <ul class="navbar-nav justify-content-center">

        <?php
        if (isset($_SESSION['id'])) {
            if ($_SESSION['role'] == "3") {
                echo "<li class='icones'><a class='nav-link' href='../admin/index.php'>Admin</a></li>";
            }
        }


        ?>
        <li class="icones">
            <a class="nav-link" href="homepage.php"><i class="fas fa-2x fa-home"></i></a>
        </li>
        <li class="icones">
            <a class="nav-link" href="filtros.php"><i class="fas fa-2x fa-search"></i></a>
        </li>
        <li class="icones">
            <a class="nav-link" href="conversas.php"><i class="far fa-2x fa-comments"></i></a>
        </li>
        <?php
        if (isset($_SESSION['id'])){
            echo "<li class=\"icones\">
            <a class=\"nav-link\" href=\"perfil.php\"><i class=\"far fa-2x fa-user\"></i></a>
        </li>";
        }else {
            echo "<li class=\"icones\">
            <a class=\"nav-link\" href=\"login.php\"><i class=\"fas fa-2x fa-sign-in-alt\"></i></a>
        </li>";
        }
        ?>


    </ul>
</nav>

<nav class="fixed-top navbar-expand navbar-dark d-none d-lg-block nav_cima">
    <ul class="navbar-nav">
        <?php
        if (isset($_SESSION['id'])) {
            if ($_SESSION['role'] == "3") {
                echo "<li class='icones'><a class='nav-link' href='../admin/index.php'>Admin</a></li>";
            }
        }
        ?>
        <li class="mx-3">
            <a class="nav-link" href="homepage.php"><p>Homepage</p></a>
        </li>
        <li class="mx-3">
            <a class="nav-link" href="filtros.php">Pesquisa</a>
        </li>
        <li class="mx-3">
            <a class="nav-link" href="conversas.php">Mensagens</a>
        </li>
        <?php

        if (isset($_SESSION['id'])){
            echo "<li class='nav-item dropdown'>                                                              
                              <a class='nav-link dropdown-toggle text-black' href='#' data-toggle='dropdown'>"
                .$_SESSION['nome']
                ."<span 
            class='caret'></span></a>                                                     
                              <ul class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'> 
                                <li><a class='dropdown-item' href='perfil.php'>A tua conta</a></li>                     
                                  <li><a class='dropdown-item' href='scripts/sc_logout.php'>Logout</a></li>           
                              </ul>                                                                                   
                          </li>                                                                                       
                         ";

        }  else {

            echo "<li class='mx-3'>
            <a class='nav-link' href='login.php'>LogIn</a>
        </li>";
        }


        ?>

    </ul>
</nav>