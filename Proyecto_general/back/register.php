<?php

    include '../db/conexion.php';
    
    if (isset($_POST['register_btn'])) {
        $names = $_POST['names'];
        $lastname = $_POST['lastname'];
        $birth = $_POST['birth'];
        $id_person = $_POST['id_person'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $pass_en = base64_encode($pass);

        $validacion = mysqli_query($conexion, "SELECT * FROM users where id_person = '$id_person'");
        $cant = mysqli_num_rows($validacion);

        if ($cant == 1) {
            header('location:../index.php?status=2');
        }else{  
            $sql = mysqli_query($conexion, "INSERT INTO users 
            (names, lastname, birth, id_person, email, pass) VALUES
            ('$names', '$lastname', '$birth', '$id_person', '$email', '$pass_en')");
            header('location:../index.php?status=1');
        }
    }
?>