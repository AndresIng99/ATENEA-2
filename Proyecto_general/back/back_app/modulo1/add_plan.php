<?php
    include '../../../db/conexion.php'; 

    session_start();
    $usuario = $_SESSION['usuario'];
    
    if (isset($_POST['plan_cat'])) {
        $valor_plan = $_POST['valor_plan'];
        $cat = $_POST['cat'];
        $month_plan = $_POST['month_plan'];

        $date_final = date("Y-m-d", strtotime($month_plan)); 


        $a_p = mysqli_query($conexion, "INSERT INTO plan 
        (month_plan, value_plan, id_category, id_person) VALUES
        ('$date_final', '$valor_plan', '$cat', '$usuario')");

        header('location:../../../app/modulo1.php');

    }

?>