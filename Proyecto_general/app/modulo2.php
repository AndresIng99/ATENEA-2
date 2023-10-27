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
    $query_category2 = mysqli_query($conexion, "SELECT * FROM category_user
    WHERE id_person = $usuario AND status_category = '1'");
 

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
        <h1>Registro de ingresos y gastos</h1>
            <hr class="sepa">
            <h3>Reportar Gasto</h3>
            <form class="form-group row" action="../back/back_app/modulo2/ingresos_gastos.php" method="POST">
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
                    <input type="number" name="valor" class="form-control" id="valor" placeholder="Digite un valor del gasto" required>
                </div>
                <button type="submit" class="btn btn-info mb-2" name="gasto">Guardar</button>
            </form>


            <h3>Reportar Ingreso</h3>
            <form class="form-group row" action="../back/back_app/modulo2/ingresos_gastos.php" method="POST">
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
                            while ($datos2 = mysqli_fetch_array($query_category2)){
                                $id_cat = $datos2['id_category'];
                                $name_cat = $datos2['category_name'];
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
                    <input type="number" name="valor" class="form-control" id="valor" placeholder="Digite un valor del ingreso" required>
                </div>
                <button type="submit" class="btn btn-info mb-2" name="ingreso">Reportar</button>
            </form>

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
    <script src="../js/component_menu.js"></script>
</body>
</html>