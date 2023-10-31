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

    $tamaño_grap_2 = 0;
    $tamaño_cat = 0;
    $tamaño_porce = 0;

    /*Grafica de pastel - gráfica 1*/

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
    
    $tamaño_cat = count($cat_name);
    $tamaño_porce = count($porcetajes);
    
    /*Grafica de lineas - gráfica 2*/

    $query_graf_2 = mysqli_query($conexion, "SELECT * FROM expenses
    WHERE id_person = $usuario"); 

    $cant2 = 0;
    while($consulta_grap_2 = mysqli_fetch_array($query_graf_2)){
        $array_g2_d_e[$cant2] = $consulta_grap_2['date_expenses'];
        $array_g2_v_e[$cant2] = $consulta_grap_2['value_expenses'];
        $array_g2_id_c_e = $consulta_grap_2['id_category'];

        $query_category_2 = mysqli_query($conexion, "SELECT * FROM category_user
        WHERE id_person = $usuario and id_category = $array_g2_id_c_e");
        while($name_cat_2 = mysqli_fetch_array($query_category_2)){
            $cat_name_2[$cant2] = $name_cat_2['category_name'];
        }



        $cant2++;
    }

    $tamaño_grap_2 = count($array_g2_d_e);


    $datosX = json_encode($cat_name_2);
    $datosY = json_encode($array_g2_v_e);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style_app.css">

    <script src="https://kit.fontawesome.com/27010df775.js" crossorigin="anonymous"></script>
    <script src="https://cdn.lordicon.com/lordicon-1.1.0.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
            <div class="dash_board">
                <h2>Gráfica de categorías con planeación del mes</h2>
                <div class="cont_grap">
                    <div id="grafica1" class="grap">
                    </div>
                    <div class="grap_table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Categoria</th>
                                <th scope="col">Porcentaje</th>
                                <th scope="col">Valor</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                    for ($x=0; $x < $tamaño_cat; $x++) { 
                                        $c_n_t = $cat_name[$x];
                                        $p_c_t = $porcetajes[$x];
                                        $v_c_t = $value_cat[$x];

                                        $v_c_t = number_format($v_c_t, 0, ',', '.');
                                        echo '
                                        <tr>
                                            <td>'.$c_n_t.'</td>
                                            <td>'.$p_c_t.' % </td>
                                            <td> $ '.$v_c_t.'</td>
                                        </tr>
                                        ';
                                    }
                                ?>
                        </tbody>
                    </table>
                    </div>
                </div>


                <h2>Gráfica de ingresos en el mes</h2>
                <div class="cont_grap">
                    <div class="grap_table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Categoria</th>
                                    <th scope="col">fecha de cargue</th>
                                    <th scope="col">Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                        for ($x=0; $x < $tamaño_grap_2; $x++) { 
                                            $a_d_e = $array_g2_d_e[$x];
                                            $a_v_e = $array_g2_v_e[$x];
                                            $a_c_n = $cat_name_2[$x];

                                            $a_v_e = number_format($a_v_e, 0, ',', '.');
                                            echo '
                                            <tr>
                                                <td>'.$a_c_n.'</td>
                                                <td>'.$a_d_e.'</td>
                                                <td> $'.$a_v_e.'</td>
                                            </tr>
                                            ';
                                        }
                                    ?>
                            </tbody>
                        </table>
                    </div>
                    <div id="grafica2" class="grap">
                    </div>
                </div>
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
    <?php include 'dashboard/grafica2.php' ?>
    <script src="../js/component_menu.js"></script>
</body>
</html>