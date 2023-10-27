<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Ejercicio 2</title>
</head>
<body>
    <form action="ejercicio2.php" method="POST">
    <div class="form-row">
        <div class="form-group col-md-12">
        <label for="edad">Edad</label>
        <input type="number" name="edad" class="form-control" id="edad" placeholder="Edad" required>
        </div>
    </div>
    <button type="submit" name="calcular" class="btn btn-primary">Calcular</button>
    </form>


    <?php
    
    if (isset($_POST['calcular'])) {
        $edad = $_POST['edad'];

        if ($edad >= 18 && $edad <=100) {
            echo '<h1>Es mayor de edad</h1>';
        }if ($edad > 100){
            echo '<h1>Valor incorrecto</h1>';
        }if ($edad < 18 && $edad > 0){
            echo '<h1>Es menor de edad</h1>';
        }if ($edad <= 0){
            echo '<h1>No ha nacido</h1>';
        }
    }

    ?>

</body>
</html>