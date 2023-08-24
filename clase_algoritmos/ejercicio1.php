<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="ejercicio1.php" method="post">
        <h1>Ingrese numeros a sumar</h1>
        <input type="number" name="n1" placeholder="ingrese numero 1">
        <input type="number" name="n2" placeholder="ingrese numero 2">
        <select name="option">
            <option value="1">Suma</option>
            <option value="2">Resta</option>
            <option value="3">Multiplicación</option>
            <option value="4">División</option>
        </select>
        <input type="submit" value="operar" name="operar">
    </form>
    <?php
    
    if (isset($_POST['operar'])) {
        $n1 = $_POST['n1'];
        $n2 = $_POST['n2'];
        $option = $_POST['option'];
        $resultado = 0;

        switch ($option) {
            case '1':
                $resultado = $n1 + $n2;
                break;
            case '2':
                $resultado = $n1 - $n2;
                break;
            case '3':
                $resultado = $n1 * $n2;
                break;
            case '4':
                $resultado = $n1 / $n2;
                break;
        }

        echo "El resultado es : ".$resultado." otra variable ".$n1;
        
    }
    
    ?>
</body>
</html>