<?php

    include '../db/conexion.php';

    if (isset($_POST['register_btn'])){
        $names = $_POST['names'];
        $lastname = $_POST['lastname'];
        $birth = $_POST['birth'];
        $email = $_POST['email'];
        $id_person = $_POST['id_person'];
        $pass = $_POST['pass'];
        $pass2 = $_POST['pass2'];
        $discapacidad = $_POST['discapacidad'];
       
        /*encriptar la contraseña*/
        $pass_en = base64_encode($pass);
        $pass2_en = base64_encode($pass2);

        
        /* validar si el usuario existe en la db */
        $validacion = mysqli_query($conexion, "SELECT * FROM users where id_person = '$id_person'");
        $cant = mysqli_num_rows($validacion);
       
        if ($cant==1){
            header( 'location:../home.php?status=2');
        }else{
        
         /* insertar usuario en la db */
             $sql = mysqli_query($conexion, "INSERT INTO users
            (names, lastname, birth, id_person, email, pass, pass2, discapacidad) VALUES
            ('$names', '$lastname', '$birth', '$id_person', '$email', '$pass_en', '$pass2_en', '$discapacidad')");
            header('location:../home.php?status=1');
        }
    }
?>