<?php

      /*   aviso de registro exitoso en db */ 
    if (isset($_GET['status'] )){
        if ($_GET['status']==1){
            echo '<script>alert("Registro exitoso");</script>';
        }
        /*   aviso de que el usuario ya existe en db */
        if ($_GET['status']==2){
            echo '<script>alert("El usuario ya existe");</script>';
        }
        /*  aviso de acceso denegado */
        if($_GET['status']== 3){
            echo '<script>alert("El usuario o contraseña no son corretos");</script>';
        }
        
        
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Faizule Perez">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/home_style.css">
    <script scr="https://kit.fontawesome.com/27010df775.js" crossorigin="anonymous"></script>
    <script> src="js/formulario.js"</script>
    <title>Tecnologia en señas</title>
</head>

<body>
    <header class="header">
        <div class="logo"><img src="image/logo_dk.png" alt="logo_dk"></div>
        <input type="checkbox" id="toggle">
        <label for="toggle"><img src="image/menu.svg" alt="menu"></label>

        <nav class="navigation">
            <ul>
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Contenidos</a>
                    <ul>
                        <li><a href="hardware.html">Hardware</a></li>
                        <li><a href="software.html">Software</a></li>
                        <li><a href="herramientas.html">Herramientas</a></li>
                    </ul>
                </li>
                <button type="button" class="btn_register" data-toggle="modal"data-target="#register_modal">Registrate</button>
                <button class="btn_login" data-toggle="modal" data-target="#login_modal">Ingresa</button>
            </ul>
        </nav>
    </header>

    <section id="main-contain">
        <div class="info">
            <h1>
                En DK trasmitimos <br>
                conceptos de tecnología <br>
                en lengua de señas <br>
                colombiana.
            </h1>
        </div>
    </section>
    <footer>
        <div class="pie">
            <hr>
            <p>La igualdad inicia con la equidad</p>
            <h5><small>&copy;2023 <b>DK</b> Todos los derechos reservados</small></h5>
        </div>
    </footer>
    <!-- Modal de resgistro -->
    <div class="modal fade" id="register_modal" tabindex="-1" role="dialog" aria-labelledby="register_modalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="register_modalLabel">Registro de usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="back/registro.php" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputnombres">Nombres</label>
                                <input type="text" class="form-control" name="names" id="inputnombres"  
                                    placeholder="Digite sus nombres" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputapellidos">Apellidos</label>
                                <input type="text" class="form-control" name="lastname" id="inputapellidos"
                                    placeholder="Digite sus Apellidos" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputfecha_nacimiento">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" name="birth" id="inputfecha_nacimiento"
                                    required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputnumero_id">Número de Identificación (usuario)</label>
                                <input type="text" class="form-control" name="id_person" id="inputnumero_id" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputemail">Correo Electrónico</label>
                                <input type="email" class="form-control" name="email" id="inputemail" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputcontra">Contraseña</label>
                                <input type="password" class="form-control" name="pass" id="inputcontra" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputcontra">Confirme Contraseña </label>
                                <input type="password" class="form-control" name="pass2" id="inputcontra" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputdiscapacidad">Discapacidad Auditiva</label>
                                <input type="text" class="form-control" name="discapacidad" id="dis" 
                                placeholder="Digite Si o no" required>
                            </div>
                        </div>
                        <button name="register_btn" type="submit" class="btn_login">Registrate</button>
                        <button type="reset" class="btn_register">Limpiar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Login-->
    <div class="modal fade" id="login_modal" tabindex="-1" role="dialog" aria-labelledby="login_modalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="login_modalLabel">Inicio de Sesión</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="back/login.php" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputnumero_id">Número de Identificación (usuario)</label>
                                <input type="text" class="form-control" name="id_person" id="inputnumero_id" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputcontra">Contraseña</label>
                                <input type="password" class="form-control" name="pass" id="inputcontra" required>
                            </div>
                        </div>
                        <button name="login_btn" type="submit" class="btn_login">Ingresa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
</body>

</html>