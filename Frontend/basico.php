<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/style.css">

    <title>Document</title>
</head>
<body>

    <?php
    if (isset($_GET['form'])) {
        $n1 = $_GET['n1'];

        echo $n1;
    }
   
    
    ?>

    <!-- Esto es un comentario -->
    <a target="_blank" rel="nofollow" title="esto es un titulo" 
    href="mailto:andresdeveloper99@gmail.com?subject=CORREO DE PRUEBA&body=Cuerpo del mensaje">enlace de correo</a>
    <a href="mailto:email@example.com?cc=secondemail@example.com, anotheremail@example.com, &bcc=lastemail@example.com&subject=Mail from our Website">Send Email</a>
    <a href="tel: +573246802565">llamar</a>
    <a href="https://wa.me/+573246802565">WhatsApp</a>
    <a href="www.google.com">google</a>
    <nav>
        <ul>
            <li>
                <a href="#primera">Primera</a>
            </li>
            <li>
                <a href="#segunda">Segunda</a>
            </li>
            <li>
                <a href="#tercera">Tercera</a>
            </li>
        </ul>
    </nav>

    <a href="javascript:alert('Hello World!');">Execute JavaScript</a>

    <p>Visita el sitio web del <abbr title="Oficina de Extensión Universidad Distrital Francisco José de Caldas">IDEXUD</abbr> </p>

    <p>Visita el sitio web del <abbr title="Universidad Distrital Francisco José de Caldas">UD</abbr> </p>

    <address>
        Written by <a href="mailto:webmaster@example.com">Jon Doe</a>.<br> 
        Visit us at:<br>
        Example.com<br>
        Box 564, Disneyland<br>
        USA
    </address>

    <p>Click on the computer, the phone, or the cup of coffee to go to a new page and read more about the topic:</p>

    <img src="workplace.jpg" alt="Workplace" usemap="#workmap" width="400" height="379">

    <map name="workmap">
    <area shape="rect" coords="34,44,270,350" alt="Computer" href="computer.htm">
    <area shape="rect" coords="290,172,333,250" alt="Phone" href="phone.htm">
    <area shape="circle" coords="337,300,44" alt="Cup of coffee" href="coffee.htm">
    </map>



    <audio controls autoplay>
        <source src="https://www.w3schools.com/TAGS/horse.mp3" type="audio/mpeg">
        Your browser does not support the audio tag.
    </audio>

    <p>Lorem ipsum dolor sit <b>Andrés</b> amet consectetur adipisicing elit. Distinctio, nobis?</p>
<br><br>

    <p>Here is a quote from WWF's website:</p>

    <blockquote cite="http://www.worldwildlife.org/who/index.html">
    For 50 years, WWF has been protecting the future of nature. The world's leading conservation organization, WWF works in 100 countries and is supported by 1.2 million members in the United States and close to 5 million globally.
    </blockquote>

    <button type=""></button>


    <details>
        <summary>Herramientas de taller</summary>
        <h1>Martillo</h1>
        <details>
            <summary>tipos</summary>
            <h3>hola</h3>
        </details>
        <h2>puntillas</h2>
        <h3>taladro</h3>
        <h4>tuercas</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, nisi.</p>
        <img src="images/descarga.png" alt="">
    </details>

    <p>Click the button to open a dialog window.</p>

    <button onclick="myFunction()">Cuadro de dialogo</button>

    <dialog id="myDialog">Este es un cuadro dedialogo</dialog>

    <script>
    function myFunction() {
    const element = document.getElementById("myDialog");
    element.open = true;
    }
    </script>

    <section id="primera"></section>
    <section id="segunda"></section>
    <section id="tercera"></section>

    <div class="cuadro1"></div>
    <div class="cuadro2"></div>

    <embed type="text/html" src="http://idexud.udistrital.edu.co/" width="500" height="200">
    

        <form action="/action_page.php">
            <fieldset>
             <legend>Personalia:</legend>
             <label for="fname">First name:</label>
             <input type="text" id="fname" name="fname"><br><br>
             <label for="lname">Last name:</label>
             <input type="text" id="lname" name="lname"><br><br>
             <label for="email">Email:</label>
             <input type="email" id="email" name="email"><br><br>
             <label for="birthday">Birthday:</label>
             <input type="date" id="birthday" name="birthday"><br><br>
             <input type="submit" value="Submit">
            </fieldset>
        </form>
    <footer>
        <address>
            Written by <a href="mailto:webmaster@example.com">Jon Doe</a>.<br> 
            Visit us at:<br>
            Example.com<br>
            Box 564, Disneyland<br>
            USA
        </address>
    </footer>

    <hr class="separador">

    <form action="basico.php" method="get">
        <input type="number" name="n1" id="n1">
        <input type="submit" name="form" value="enviar">
    </form>

    <iframe width="500px" height="900px" src="http://idexud.udistrital.edu.co/#"></iframe>

    <iframe width="1190" height="669" 
    src="https://www.youtube.com/embed/_ScMKOfZUMM" 
    title="MUSICAL TRIP No.2 2023 Melodic &amp; 
    Progressive House/Techno" frameborder="2" 
    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    <iframe class="video_prueba" src="https://www.youtube.com/embed/QxRCiptX1jU" title="motos que no valen la pena comprar" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>



        <form action="">
            <input type="button" value="esto es un boton">
            <input type="checkbox"  name="" id="" >
            <input type="date" name="" id="">
            <input type="datetime" name="" id="">
            <input type="email" name="" id="">
            <input type="file" name="" id="">
            <input type="hidden" name="">
            <input type="month" name="" id="">
            <input type="number" name="" id="">
            <input type="password" name="" id="">
            <input type="radio" name="" id="">
            <input type="range" name="" id="">
            <input type="reset" value="reset">
            <input type="submit" value="envio">
            <input type="tel" name="" id="">
            <input type="text" name="" id="">
            <input type="time" name="" id="">
            <input type="week" name="" id="">
        </form>

    </body>
</html>