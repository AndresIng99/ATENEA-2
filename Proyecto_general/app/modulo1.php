<?php

    session_start();
    include '../db/conexion.php';
    
    $nombre = $_SESSION['nombre'];
    $apellido = $_SESSION['apellido'];
    $nacimiento = $_SESSION['nacimiento'];
    $usuario = $_SESSION['usuario'];
    $email = $_SESSION['email'];

    $nombre_completo = $nombre.' '.$apellido; 

    $query_category = mysqli_query($conexion, "SELECT * FROM category_user
    WHERE id_person = $usuario AND status_category = '1'");

    $query_plan = mysqli_query($conexion, "SELECT * FROM plan
    WHERE id_person = $usuario");

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

    <title>Centavos Sabios</title>
</head>
<body>
    <section id="general_section">
        <div class="left_menu">
            <menu-main></menu-main>
        </div>
        <div class="central"> 
            <h1>Planeación presupuestal del mes - Meta</h1>
            <hr class="sepa">

            <form class="form-group row" action="../back/back_app/modulo1/add_plan.php" method="POST">
                <!--espacio del input con icono-->
                <label for="month_plan">Mes de Planeación</label>
                <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <lord-icon class="icons_form"
                                src="https://cdn.lordicon.com/wyqtxzeh.json"
                                trigger="loop"
                                delay="500">
                            </lord-icon>
                        </div>
                    </div>
                    <input type="month" name="month_plan" class="form-control" id="month_plan" required>
                </div>
                <!--espacio del input con icono-->
                <label for="category">Categoria</label>
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <lord-icon class="icons_form"
                                    src="https://cdn.lordicon.com/rmjnvgsm.json"
                                    trigger="loop"
                                    delay="500">
                                </lord-icon>
                            </div>
                        </div>
                        <select class="form-control" name="cat" id="category" required>
                            <option value="">seleccione una categoria</option>
                            <?php
                            while ($datos = mysqli_fetch_array($query_category)){
                                $id_cat = $datos['id_category'];
                                $name_cat = $datos['category_name'];
                                echo
                                '<option value="'.$id_cat.'">'.$name_cat.'</option>';
                            }?>
                        </select>
                </div>
                <!--espacio del input con icono-->
                <label for="valor">Valor</label>
                <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <lord-icon class="icons_form"
                                src="https://cdn.lordicon.com/qvyppzqz.json"
                                trigger="loop"
                                delay="500">
                            </lord-icon>
                        </div>
                    </div>
                    <input type="number" name="valor_plan" class="form-control" id="valor" placeholder="Digite un valor de planeación para la categoria" required>
                </div>
                <button type="submit" class="btn btn-info mb-2" name="plan_cat">Guardar</button>
            </form>

            <div class="cont_table">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Mes</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Categoria</th>
                        </tr>
                    </thead>
                    <tbody>
            <?php
            
            while ($datos2 = mysqli_fetch_array($query_plan)){
                $month_p = $datos2['month_plan'];
                $value_p = $datos2['value_plan'];
                $id_c = $datos2['id_category'];

                $month_p = date("F", strtotime($month_p)); 
                $value_p = number_format($value_p, 0, ',', '.');

                $query_category2 = mysqli_query($conexion, "SELECT * FROM category_user
                WHERE id_category = $id_c AND id_person = $usuario");

                while ($datos3 = mysqli_fetch_array($query_category2)){
                    $name_cat = $datos3['category_name'];
                }

                echo '
                <tr>
                    <td>'.$month_p.'</td>
                    <td>$ '.$value_p.'</td>
                    <td>'.$name_cat.'</td>
                </tr>';

            }
            
            ?>
                    </tbody>
                </table>
            </div>




        </div>
        <div class="right_menu">
            <div class="profile">
                <img src="https://thispersondoesnotexist.com/" alt="">
                <p><?php echo $nombre_completo?></p>
                <span><?php echo $email?></span>
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

    <script src="../js/component_menu.js"></script>
</body>
</html>