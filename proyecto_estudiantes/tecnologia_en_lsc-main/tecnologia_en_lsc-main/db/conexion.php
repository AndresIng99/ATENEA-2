<?php
    /*Archivo de conexion a base e datos*/

    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "tecnologia_en_señas";

    $conexion = new mysqli($server, $user, $pass, $db);

    if ($conexion->connect_errno){
        echo "error de conexion";
        exit();
    }else{
        echo "conexion ok";
    }
?>