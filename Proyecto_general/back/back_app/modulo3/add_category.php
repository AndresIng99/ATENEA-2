<?php
    include '../../../db/conexion.php'; 

    session_start();
    $usuario = $_SESSION['usuario'];
    
    if (isset($_POST['add_cate'])) {
        $name_category = $_POST['name_category'];
        $status = $_POST['status'];

        $a_c = mysqli_query($conexion, "INSERT INTO category_user 
        (category_name, status_category, id_person) VALUES
        ('$name_category', '$status', '$usuario')");

        header('location:../../../app/modulo3.php');

    }

?>