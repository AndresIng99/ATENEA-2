<?php
$host = "127.0.0.1:3307"; // Cambia esto a la dirección de tu servidor de base de datos
$usuario = "rootie"; // Cambia esto a tu nombre de usuario de base de datos
$contrasena = "891533"; // Cambia esto a tu contraseña de base de datos
$base_de_datos = "registro"; // Cambia esto al nombre de tu base de datos

// Conectarse a la base de datos
$conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Recuperar los datos del formulario
$names = $_POST['names'];
$lastnames = $_POST['lastnames'];
$birth = $_POST['birth'];
$id_person = $_POST['id_person'];
$email = $_POST['email'];
$pass = $_POST['pass'];

// Insertar los datos en la base de datos
$sql = "INSERT INTO users (names, lastnames, birth, id_person, email, pass) VALUES ('$names', '$lastnames', '$birth', '$id_person', '$email', '$pass')";

if ($conexion->query($sql) === TRUE) {
    // Registro exitoso, puedes realizar otras acciones aquí si es necesario
} else {
    // Error al registrar el usuario, puedes realizar otras acciones aquí si es necesario
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
