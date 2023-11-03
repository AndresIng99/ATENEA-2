<?php

/*inicio de session */
session_start();
include '../db/conexion.php';

$nombre = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];
$fecha = $_SESSION['fecha'];
$cedula = $_SESSION['cedula'];
$correo = $_SESSION['correo'] ;
$discapacidad = $_SESSION['discapacidad'] ;

echo"<h1> Bienvenido $nombre $apellido<h1> ";

?>