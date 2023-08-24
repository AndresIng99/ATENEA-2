<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="clase_3.php" method="post">
        <input type="number" name="n1" placeholder="digite numero 1" required>
        <input type="number" name="n2" placeholder="digite numero 2" required>
        <input type="submit" name="verificar">
    </form>

    <?php
    
    if (isset($_POST['verificar'])) {
        $n1=$_POST['n1'];
        $n2=$_POST['n2'];

        if ($n1 == $n2) {
            echo "son iguales";
        }
        else if ($n1 > $n2) {
            echo "Número 1 es mayor";
        }else{
            echo "Número 2 es mayor";
        }
    }
    
    ?>
</body>
</html>