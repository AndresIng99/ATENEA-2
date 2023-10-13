<?php

    session_start();
    include '../db/conexion.php';
    
    $nombre = $_SESSION['nombre'];
    $apellido = $_SESSION['apellido'];
    $nacimiento = $_SESSION['nacimiento'];
    $usuario = $_SESSION['usuario'];
    $email = $_SESSION['email'];

    echo '<h1>HOLA '.$nombre.' '.$apellido.'</h1>';

?>