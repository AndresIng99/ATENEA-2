<?php

include '../db/conexion.php';

if (isset($_POST['login_btn'])) {
    $id = $_POST['id_person'];
    $pass = $_POST['pass'];
    $pass_code = base64_encode($pass);

    $consulta = mysqli_query($conexion, "SELECT * FROM users 
                            where id_person = '$id' and pass = '$pass_code'");
    $exist = mysqli_num_rows($consulta);

    if ($exist == 1) {
        session_start();
        while ($datos = mysqli_fetch_array($consulta)) {
            $_SESSION['nombre'] = $datos['names'];
            $_SESSION['apellido'] = $datos['lastname'];
            $_SESSION['nacimiento'] = $datos['birth'];
            $_SESSION['usuario'] = $datos['id_person'];
            $_SESSION['email'] = $datos['email'];
        }
        header('location:../app/modulo1.php');
    }else {
        header('location:../index.php?status=3');
    }
    
}

?>