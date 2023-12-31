<?php
if (isset($_GET['status'])) {
    if ($_GET['status'] == 1) {
        echo '<script>alert("registro éxitoso");</script>';
    }
    if ($_GET['status'] == 2) {
        echo '<script>alert("El usuario ya existe");</script>';
    }
    if ($_GET['status'] == 3) {
        echo '<script>alert("Acceso denegado");</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="finanzas, finanaciera, personales">
    <meta name="author" content="Andrés Pineda">
    <meta name="description" content="Es la aplicación que pondrá orden en tus finanzas personales de forma automática e inteligente. Registra tus ingresos y gastos para tener una visión clara de tu situación financiera en tiempo real. La app analiza tus hábitos de consumo y te ayuda a crear un presupuesto personalizado, identificando oportunidades de ahorro.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style_main.css">
    <title>Centavos Sabios</title>
</head>
<body>
    <header>
        <nav>
            <div>
              <img src="img/logo_blanco.png" alt="">
            </div>
            <div>
              <ul id="nav">
                <li><a href="#">Home</a></li>
                <li><a href="#services">Servicios</a></li>
                <li><a href="#contactox">Contacto</a></li>
              </ul>
            </div>
            <div class="menu" id="menu">
              <span></span>
              <span></span>
              <span></span>
            </div>
          </nav>
          <div class="filter">
          </div>
          <div class="general_info">
            <h1>CENTAVOS SABIOS</h1>
            <h2>Tus Finanzas Bajo Control </h2>
            <p>
                Es la aplicación que pondrá orden en tus finanzas personales 
                de forma automática e inteligente. Registra tus ingresos y 
                gastos para tener una visión clara de tu situación financiera
                en tiempo real. La app analiza tus hábitos de consumo y te ayuda
                a crear un presupuesto personalizado, identificando oportunidades
                de ahorro.
            </p>

            <button type="button" class="btn_register" data-toggle="modal" data-target="#register_modal">Registrate</button>
            <button class="btn_login" data-toggle="modal" data-target="#login_modal">Ingresa</button>
          </div>
    </header>


    





  
    <!-- Modal de Registro-->
    <div class="modal fade" id="register_modal" tabindex="-1" role="dialog" aria-labelledby="register_modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="register_modalLabel">Registro de usuario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="back/register.php" method="POST">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputnombres">Nombres</label>
                        <input type="text" class="form-control" name="names" id="inputnombres" placeholder="Digite sus nombres" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputapellidos">Apellidos</label>
                        <input type="text" class="form-control" name="lastname" id="inputapellidos" placeholder="Digite sus Apellidos" required>
                      </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputfecha_nacimiento">Fecha de Nacimiento</label>
                          <input type="date" class="form-control" name="birth" id="inputfecha_nacimiento" required>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputnumero_id">Número de Identificación (usuario)</label >
                          <input type="text" class="form-control" name="id_person" id="inputnumero_id" required>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputemail">Correo Electrónico</label>
                          <input type="email" class="form-control" name="email" id="inputemail" required>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputcontra">Contraseña</label>
                          <input type="password" class="form-control" name="pass" id="inputcontra" required>
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
    <div class="modal fade" id="login_modal" tabindex="-1" role="dialog" aria-labelledby="login_modalLabel" aria-hidden="true">
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
                          <label for="inputnumero_id">Número de Identificación (usuario)</label >
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









    <!--SECCION DE Planeación presupuestal del mes-->
    <section class="structure_one" id="services">
        <div class="info_section">
            <div class="title">
                <h3>Planeación presupuestal del mes</h3>
            </div>
            <p>
                Este módulo podría estar diseñado para ayudar a los usuarios a planificar sus 
                gastos e ingresos para un mes específico. Puede incluir herramientas para 
                ingresar ingresos esperados, gastos planificados y luego proporcionar un 
                resumen de cómo se espera que se comporte el presupuesto durante ese mes.
            </p>
        </div>
        <div class="illustration_section">
            <img src="img/planeacion.png" alt="">
            <img class="marca_agua" src="img/marca_agua.png" alt="">
        </div>
    </section>
    <!--SECCION DE Registro de ingresos y gastos-->
    <section class="structure_one reverse">
        <div class="illustration_section">
            <img src="img/registro_ingresos.png">
            <img class="marca_agua" src="img/marca_agua.png" alt="">
        </div>
        <div class="info_section">
            <div class="title">
                <h3>Registro de ingresos y gastos</h3>
            </div>
            <p>
                Este módulo es una herramienta fundamental para registrar y realizar un seguimiento de las transacciones financieras. Los usuarios pueden ingresar detalles sobre sus ingresos y gastos, incluyendo la fecha, la cantidad y la categoría a la que pertenecen. Esto ayuda a mantener un registro financiero ordenado y a entender cómo se está utilizando el dinero.
            </p>
        </div>
    </section>
    <!--SECCION DE Administra tus propias categorías-->
    <section class="structure_one">
        <div class="info_section">
            <div class="title">
                <h3>Administra tus propias categorías</h3>
            </div>
            <p>
                Este módulo probablemente permita a los usuarios personalizar y gestionar las categorías en las que registran sus gastos e ingresos. Por ejemplo, podrían crear categorías como "comida", "alquiler", "entretenimiento", etc., para organizar y seguir mejor sus transacciones financieras.
            </p>
        </div>
        <div class="illustration_section">
            <img src="img/admin_categorias.png" alt="">
            <img class="marca_agua" src="img/marca_agua.png" alt="">
        </div>
    </section>
    <!--SECCION DE Calculadora de interés compuestos-->
    <section class="structure_one reverse">
        <div class="illustration_section">
            <img src="img/calculadora.png">
            <img class="marca_agua" src="img/marca_agua.png" alt="">
        </div>
        <div class="info_section">
            <div class="title">
                <h3>Calculadora de interés compuestos</h3>
            </div>
            <p>
                Una calculadora de interés compuesto es una herramienta que permite a los usuarios calcular cuánto dinero pueden ganar o ahorrar con una inversión a lo largo del tiempo, teniendo en cuenta la capitalización de intereses. Por lo general, se ingresa el capital inicial, la tasa de interés y el período de tiempo, y la calculadora muestra el crecimiento potencial del dinero a lo largo de ese período.
            </p>
        </div>
    </section>
    <!--SECCION DE Dashboard de seguimiento globalizado.-->
    <section class="structure_one">
        <div class="info_section">
            <div class="title">
                <h3>Dashboard de seguimiento globalizado</h3>
            </div>
            <p>
                Un "dashboard" es un panel de control que muestra información clave de forma resumida y visualmente accesible. En este contexto, un "Dashboard de Seguimiento Globalizado" probablemente se refiere a una página o sección de la web que ofrece una visión general de datos relevantes o métricas en tiempo real sobre algún aspecto global o general, como puede ser el rendimiento financiero, el progreso hacia objetivos, o cualquier otro conjunto de datos importante para el usuario.
            </p>
        </div>
        <div class="illustration_section">
            <img src="img/dashboard_1.png" alt="">
            <img class="marca_agua" src="img/marca_agua.png" alt="">
        </div>
    </section>

    <footer id="contacto">
        <div class="logo">
            <img src="img/logo_blanco.png" alt="">
        </div>
        <div class="contain-main-footer">
            <div class="contact">
                <h4>Datos de contacto</h4>
                <address>
                    Universidad DistritalFrancisco José de CaldasNIT. 899.999.230.7

                    <ul>
                        <li>
                            <i class="bi bi-caret-right">Institución de Educación Superior sujeta a inspección y vigilancia por el Ministerio de Educación Nacional</i>
                        </li>
                        <li>
                            <i class="bi bi-caret-right">Acuerdo de creación N° 10 de 1948 del Concejo de Bogotá</i>
                        </li>
                        <li>
                            <i class="bi bi-caret-right">Acreditación Institucional de Alta Calidad - Resolución N° 023653 del 10 de diciembre del 2021                            </i>
                        </li>
                    </ul>
                </address>
               

                                    
            </div>
            <div class="regulatory">
                <h4>Normatividad general</h4>
                <ul>
                    <li>
                        <i class="bi bi-caret-right">Estatuto General</i>
                    </li>
                    <li>
                        <i class="bi bi-caret-right">Proyecto Universitario Institucional - PUI</i>
                    </li>
                </ul>
                <h4>Normatividad académica</h4>
                <ul>
                    <li>
                        <i class="bi bi-caret-right">Derechos pecuniarios</i>
                    </li>
                    <li>
                        <i class="bi bi-caret-right">Estatuto Estudiantil</i>
                    </li>
                    <li>
                        <i class="bi bi-caret-right">Estatuto Docente</i>
                    </li>
                    <li>
                        <i class="bi bi-caret-right">Estatuto Académico</i>
                    </li>
                </ul>
            </div>
            <div class="location">
                <h4>Ubicación</h4>
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3976.811409971502!2d-74.06924539235031!3d4.6277106729873!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2sco!4v1696980025758!5m2!1ses!2sco" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
                <div class="social-media">
                    <i class="bi bi-facebook"></i>
                    <i class="bi bi-whatsapp"></i>
                    <i class="bi bi-instagram"></i>
                    <i class="bi bi-linkedin"></i>
                    <i class="bi bi-discord"></i>
                </div>
            </div>
        </div>

        <div class="copy-right">
            <span>© Copyright 2023 | Sitio creado y administrado por la  Andrés S.A</span>
        </div>
        
    </footer>

      <script src="js/script_menu.js"></script>
</body>
</html>