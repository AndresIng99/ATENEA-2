<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Ejercicio 1</title>
</head>
<body>
    <form action="ejercicio1.php" method="POST">
    <div class="form-row">
        <div class="form-group col-md-6">
        <label for="n1">Número 1</label>
        <input type="number" step="any" name="n1" class="form-control" id="n1" placeholder="Digite número 1" required>
        </div>
        <div class="form-group col-md-6">
        <label for="n2">Número 2</label>
        <input type="number" step="any" name="n2" class="form-control" id="n2" placeholder="Digite número 2" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
        <label for="operacion">Operación a realizar</label>
        <select id="operacion" name="ope" class="form-control" required>
            <option value="">Seleccione una operación...</option>
            <option value="1">Suma</option>
            <option value="2">Resta</option>
            <option value="3">Multiplicación</option>
            <option value="4">División</option>
        </select>
        </div>
    </div>
    <button type="submit" name="operar" class="btn btn-primary">Operar</button>
    </form>


    <?php
    
    if (isset($_POST['operar'])) {
        $n1 = $_POST['n1'];
        $n2 = $_POST['n2'];
        $ope = $_POST['ope'];

        switch ($ope) {
            case '1':
                $total = $n1 + $n2;
                $ope2 = 'suma'; 
                break;
            case '2':
                $total = $n1 - $n2;
                $ope2 = 'resta';
                break;
            case '3':
                $total = $n1 * $n2;
                $ope2 = 'multiplicación';
                break;
            case '4':
                $total = $n1 / $n2;
                $ope2 = 'división';
                break;
        }

        echo '<h1>La '.$ope2.' entre el número '.$n1.' y el número '.$n2.' es igual a = '.$total.'</h1>';
    }

    ?>

</body>
</html>