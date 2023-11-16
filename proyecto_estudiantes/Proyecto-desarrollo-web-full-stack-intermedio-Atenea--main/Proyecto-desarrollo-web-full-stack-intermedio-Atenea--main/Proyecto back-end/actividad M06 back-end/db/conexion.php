<?php

    $host = '127.0.0.1:3307';
    $usuario = 'rootie';
    $contraseña = '891533';
    $basedatos = 'mi_proyecto';

    $conexion = new mysqli($host,$usuario,$contraseña,$basedatos);

    if ($conexion->connect_errno) {
        echo "fallos en conexión";
        exit();
    }

?>