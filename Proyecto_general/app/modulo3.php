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

                <form class="form-group row" action="modulo4.php" method="POST">
                    <!--espacio del input con icono-->
                    <label for="name_category">Nombre de la Categoria</label>
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
                        <input type="text" name="name_category" class="form-control" id="name_category" placeholder="Nombre de la Categoria" required>
                    </div>
                    <!--espacio del input con icono-->
                    <label for="status">Período del ahorro (meses)</label>
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
                        <select class="form-control" name="status" id="status" required>
                            <option >seleccione un opción</option>
                            <option value="1">Habilitado</option>
                            <option value="2">Deshabilitado</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-info mb-2" name="add_cate">Calcular</button>
                </form>


            </div>
            <div class="update_category">
                <h2>Estado de categorias</h2>
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
    <script src="../js/component_menu.js"></script>
</body>
</html>