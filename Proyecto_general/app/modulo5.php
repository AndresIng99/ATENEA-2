<?php

    session_start();
    include '../db/conexion.php';
    $nombre = $_SESSION['nombre'];
    $apellido = $_SESSION['apellido'];
    $nacimiento = $_SESSION['nacimiento'];
    $usuario = $_SESSION['usuario'];
    $email = $_SESSION['email'];

    $nombre_completo = $nombre.' '.$apellido; 
    $date = date("Y-m"); 
    $date = date("Y-m-d", strtotime($date));

    

    $query_category_value = mysqli_query($conexion, "SELECT * FROM plan
    WHERE id_person = $usuario and month_plan = '$date'"); 

    $cant = 0;
    while($consulta_grap = mysqli_fetch_array($query_category_value)){
        $cat_id = $consulta_grap['id_category'];
        $value_cat[$cant] = $consulta_grap['value_plan'];


        $query_category = mysqli_query($conexion, "SELECT * FROM category_user
        WHERE id_person = $usuario and id_category = $cat_id");
        while($name_cat = mysqli_fetch_array($query_category)){
            $cat_name[$cant] = $name_cat['category_name'];
        }
        
        $cant++;
    }

    $suma_category = array_sum($value_cat);
    $tamaño = count($value_cat);

    
    for ($i=0; $i < $tamaño; $i++) { 
        $porcetajes[$i] = round(($value_cat[$i]*100)/$suma_category, 0);
    }

    $datoslabel = json_encode($cat_name);
    $datosvalor = json_encode($porcetajes);
    
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style_app.css">

    <script src="https://kit.fontawesome.com/27010df775.js" crossorigin="anonymous"></script>
    <script src="https://cdn.lordicon.com/lordicon-1.1.0.js"></script>
    <script src="https://cdn.plot.ly/plotly-2.27.0.min.js" charset="utf-8"></script>
    <title>Centavos Sabios</title>
</head>
<body>
    <section id="general_section">
        <div class="left_menu">
            <menu-main></menu-main>
        </div>
        <div class="central">
            <h1>Dashboard de seguimiento globalizado</h1>
            <hr class="sepa">
            <div id="grafica1">
            </div>
        </div>
        <div class="right_menu">
            <div class="profile">
                <img src="https://thispersondoesnotexist.com/" alt="">
                <p>Andrés Pineda</p>
                <span>andres@gmail.com</span>
            </div>
            <hr class="sepa">
            <div class="last_tras">
                <h2>Ultimos movimientos</h2>
                <div class="t_i">
                    <span>18/10/2023</span>
                    <p>Lorem ipsum dolor, sit amet 
                        consectetur adipisicing elit. 
                        Cupiditate, excepturi.</p>
                </div>
                <div class="t_i">
                    <span>18/10/2023</span>
                    <p>Lorem ipsum dolor, sit amet 
                        consectetur adipisicing elit. 
                        Cupiditate, excepturi.</p>
                </div>
                <div class="t_i">
                    <span>18/10/2023</span>
                    <p>Lorem ipsum dolor, sit amet 
                        consectetur adipisicing elit. 
                        Cupiditate, excepturi.</p>
                </div>
                <div class="t_i">
                    <span>18/10/2023</span>
                    <p>Lorem ipsum dolor, sit amet 
                        consectetur adipisicing elit. 
                        Cupiditate, excepturi.</p>
                </div>
            </div>
        </div>
        
    </section>
    <script src="../js/arreglo.js"></script>
    <?php include 'dashboard/grafica1.php' ?>
    <script src="../js/component_menu.js"></script>
</body>
</html>