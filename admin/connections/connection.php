<?php

function new_db_connection()
{
    $env = "labmm";
    //$env = "labmm";

    // Variables for the database connection
    if ($env == "labmm") {
        $hostname = 'labmm.clients.ua.pt';
        $username = "deca_20L4_34_web";
        $password = "ObKz1s1Q";
        $dbname = "deca_20L4_34";
    }
    if ($env == "localhost") {
        $hostname = 'localhost';
        $username = "root";
        $password = "";
        $dbname = "miniprojet";
    }

    // Makes the connection
    $local_link = mysqli_connect($hostname, $username, $password, $dbname);

    // If it fails to connect then die and show errors
    if (!$local_link) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Define charset to avoid special chars errors
    mysqli_set_charset($local_link, "utf8");

    // Return the link
    return $local_link;
}