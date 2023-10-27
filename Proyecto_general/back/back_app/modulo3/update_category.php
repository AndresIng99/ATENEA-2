<?php
    include '../../../db/conexion.php'; 

    session_start();
    $usuario = $_SESSION['usuario'];
    
    if (isset($_POST['change'])) {
        $id = $_POST['id_cat'];
        $status_cat = $_POST['status_cat'];
        if ($status_cat == 0) {
            $new_status = 1;
        }else{
            $new_status = 0;
        }
        $query = mysqli_query($conexion, "UPDATE category_user 
        SET status_category = $new_status 
        WHERE id_category = $id AND id_person = $usuario");

        header('location:../../../app/modulo3.php');

    }

?>