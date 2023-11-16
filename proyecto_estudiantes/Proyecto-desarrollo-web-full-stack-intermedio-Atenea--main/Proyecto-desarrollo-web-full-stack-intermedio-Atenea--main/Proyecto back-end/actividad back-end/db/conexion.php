<?php
$host = '127.0.0.1:3307';
$usuario = 'rootie';
$contraseña = '891533';
$basedatos = 'registro';

$conexion = new mysqli($host, $usuario, $contraseña, $basedatos);

// Verificar la conexión
if ($conexion->connect_errno) {
    echo "Fallos en la conexión";
    exit();
} 
// No es necesario cerrar la conexión aquí, ya que el script se detiene después de la redirección
?>
