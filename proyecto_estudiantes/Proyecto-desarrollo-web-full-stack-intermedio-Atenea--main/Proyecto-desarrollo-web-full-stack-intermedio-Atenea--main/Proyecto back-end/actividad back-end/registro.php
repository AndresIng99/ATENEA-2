
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Préstamos en línea y créditos rápidos</title>
    <script src="https://kit.fontawesome.com/450fde0f6e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/registro.css"> 
</head>

<body>
    
    <header>
        <h1>Credy </h1>
    </header>
   
    <section id="main-contain">
        <div class="contenedor">
            <div class="texto">
                <h1>¡Préstamos rápidos en un click !</h1>
                <p>Hasta $5.000.000 sin salir de casa. Quédate en casa sin estresarte - tenemos el dinero extra que necesitas 24/7</p>
            </div>
        </div>
        <div class="cuadro">
            <!-- Tu formulario de registro aquí -->
            <form id="registrationForm" action="db/conexionR.php" method="POST">
                <div class="form-group">
                    <label for="inputnombres">Nombres</label>
                    <input type="text" class="form-control" name="names" id="inputnombres" placeholder="Digite sus nombres" required>
                </div>
                <div class="form-group">
                    <label for="inputapellidos">Apellidos</label>
                    <input type="text" class="form-control" name="lastnames" id="inputapellidos" placeholder="Digite sus Apellidos" required>
                </div>
                <div class="form-group">
                    <label for="inputfecha_nacimiento">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" name="birth" id="inputfecha_nacimiento" required>
                </div>
                <div class="form-group">
                    <label for="inputnumero_id">Número de Identificación (usuario)</label>
                    <input type="text" class="form-control" name="id_person" id="inputnumero_id" required>
                </div>
                <div class="form-group">
                    <label for="inputemail">Correo Electrónico</label>
                    <input type="email" class="form-control" name="email" id="inputemail" required>
                </div>
                <div class="form-group">
                    <label for="inputcontra">Contraseña</label>
                    <input type="password" class="form-control" name="pass" id="inputcontra" required>
                </div>
            <div class="boton">  
              <button type="submit" id="btn_login">OBTÉN TU PRÉSTAMO</button>
            </div>
            </form>
        </div>

        
    </section>
    <footer>
        <div class="opciones">
            <ul>
                <li><label for="#">Créditos ˅ </label></li>
                <li><label for="#">Lugares ˅ </label></li>
                <li><label for="#">Préstamos ˅ </label></li>
                <li><label for="#">Servicios ˅ </label></li>
            </ul>
            
        </div>
        <div class="opciones2">
            <a href="https://www.credy.com.co/about-us/">Sobre nosotros</a>
            <a href="https://www.credy.com.co/politica-de-privacidad/">Politica de privacidad</a>
            <a href="https://www.credy.com.co/politica-de-cookies/">Politicas de cookies</a>
            <a href="https://www.credy.com.co/contact/">Contacta con nosotros</a>
        </div>
        <div class="opciones3">
            <div class="bandera-colombia">
                <span class="Colombia">Colombia </span>
            </div>
        </div>
        <hr>
        <div class="linea">
            <h2>Credy</h2>
            <a href="https://www.facebook.com/credy.com.co/">Siguenos<i class="fa-brands fa-facebook"></i></a>
            <p>Copywitre © 2023 Credy</p>
        </div>
    </footer>
    <script src="js/script3.js"></script>
</body>

</html>
