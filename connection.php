<?php
    try {
        $server = "localhost";
        $user = "root";
        $password = "";
        $database = "viadigital";

        $con = new mysqli($server, $user, $password, $database);
        $con -> set_charset("utf8");
    } catch (Exception $e) {
        error_log($e->getMessage());
        die("Error al conectar a la base de datos.");
    }    
?>