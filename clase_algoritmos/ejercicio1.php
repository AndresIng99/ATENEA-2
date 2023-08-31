<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Document</title>
    </head>
    <body>
        <form action="ejercicio1.php" method="POST">
            <h1>Ingrese numeros a operar</h1>
            <input type="number" name="n1" placeholder="ingrese numero 1">
            <input type="number" name="n2" placeholder="ingrese numero 2">
            <!--<label for="">selecione operación a realizar</label>
            <select name="option">
                <option value="1">Suma</option>
                <option value="2">Resta</option>
                <option value="3">Multiplicación</option>
                <option value="4">División</option>
            </select>-->
            <input type="submit" value="operar" name="operar">
        </form>
        <?php
        
        if (isset($_POST['operar'])) {
            $n1 = $_POST['n1'];
            $n2 = $_POST['n2'];
            /*
            $option = $_POST['option'];
            $resultado = 0;*/

            
            $suma = $n1 + $n2;
            $resta = $n1 - $n2;
            $multiplicacion = $n1 * $n2;
            $divi = $n1 / $n2;
            

            echo "El resultado de suma es : ".$suma."<br>";
            echo "El resultado de resta es : ".$resta."<br>";
            echo "El resultado de multiplicación es : ".$multiplicacion."<br>";
            echo "El resultado de división es : ".$divi."<br>";

            
        }
        
        ?>
    </body>
</html>