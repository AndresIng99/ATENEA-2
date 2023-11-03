<?php

include '../db/conexion.php';

if(isset($_POST['login_btn'])){
    $id =$_POST['id_person'];
    $pass = $_POST['pass'];
   
    $pass_code = base64_encode($pass);
   
   
   $consulta = mysqli_query($conexion,"SELECT * FROM users
                             where id_person = '$id'and pass ='$pass_code'");

    $exist = mysqli_num_rows($consulta);
    
     if ($exist ==1){
        session_start();
        /* traer los datos con variables de session*/
        while($datos = mysqli_fetch_array ($consulta)){
            $_SESSION['nombre'] =$datos['names'];
            $_SESSION['apellido'] =$datos['lastname'];
            $_SESSION['fecha'] =$datos['birth'];
            $_SESSION['cedula'] =$datos['id_person'];
            $_SESSION['correo'] =$datos['email'];
            $_SESSION['discapacidad'] =$datos['discapacidad'];
          
            



           
        }
        header('location:../app/index.php');

    }else{
        header('location:../home.php?status=3');
    }
 
}
?>