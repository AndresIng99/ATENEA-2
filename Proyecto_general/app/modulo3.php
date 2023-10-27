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
            <h1>Administra tus propias categorías</h1>
            <hr class="sepa">
            <div class="add_category">
                <h2>Agregar categorias</h2>

                <form class="form-group row form2" action="../back/back_app/modulo3/add_category.php" method="POST">
                    <!--espacio del input con icono-->
                    <label for="name_category">Nombre de la Categoria</label>
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
                        <input type="text" name="name_category" class="form-control" id="name_category" placeholder="Nombre de la Categoria" required>
                    </div>
                    <!--espacio del input con icono-->
                    <label for="status">Estado</label>
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <lord-icon class="icons_form"
                                    src="https://cdn.lordicon.com/qeemqlwz.json"
                                    trigger="loop"
                                    delay="500">
                                </lord-icon>
                            </div>
                        </div>
                        <select class="form-control" name="status" id="status" required>
                            <option value="">seleccione un opción</option>
                            <option value="1">Habilitado</option>
                            <option value="0">Deshabilitado</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-info mb-2" name="add_cate">Guardar</button>
                </form>


            </div>
            <div class="update_category">
                <h2>Estado de categorias</h2>
                <div class="cont_table table2">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nombre categoria</th>
                                <th scope="col">estado</th>
                                <th scope="col">Cambiar estado</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                <?php
                
                while ($datos = mysqli_fetch_array($query_category)){
                    $id_cat = $datos['id_category'];
                    $status_cat = $datos['status_category'];
                    $name_cat = $datos['category_name'];

                    if ($status_cat == 1) {
                        $status_cat_s = 'Habilitado';
                    }else{
                        $status_cat_s = 'Deshabilitado';
                    }

                echo '<tr>
                            <td>'.$name_cat.'</td>
                            <td>'.$status_cat_s.'</td>
                            <td>
                                <form action="../back/back_app/modulo3/update_category.php" method="POST">
                                    <input type="hidden" name="id_cat" value='.$id_cat.'>
                                    <input type="hidden" name="status_cat" value='.$status_cat.'>
                                    <button type="submit" name="change"><i class="fa-solid fa-arrows-spin"></i></button>
                                </form>
                            </td>
                        </tr>';
                }
                
                ?>
                        </tbody>
                    </table>
                </div>
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