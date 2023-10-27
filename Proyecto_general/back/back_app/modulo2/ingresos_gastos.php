<?php

include '../../../db/conexion.php'; 

    session_start();
    $usuario = $_SESSION['usuario'];
    $date_act = date('Y-m-d H:m:s');
    

if (isset($_POST['gasto'])) {
    $cat = $_POST['cat'];
    $valor = $_POST['valor'];


    $gasto = mysqli_query($conexion, "INSERT INTO expenses 
        (value_expenses, date_expenses, id_category, id_person) VALUES
        ('$valor', '$date_act', '$cat', '$usuario')");
        header('location:../../../app/modulo2.php');
}

if (isset($_POST['ingreso'])) {
    $cat = $_POST['cat'];
    $valor = $_POST['valor'];

    $ingreso = mysqli_query($conexion, "INSERT INTO income 
        (value_income, date_income, id_category, id_person) VALUES
        ('$valor', '$date_act', '$cat', '$usuario')");
        header('location:../../../app/modulo2.php');
}

?>