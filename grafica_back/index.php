<?php

include ('db/conexion.php');

$usuario = 111111;

if (isset($_POST['datos'])) {
    $u_consult = $_POST['user'];
    $usuario = $u_consult;
}

$query_users = mysqli_query($conexion, "SELECT * FROM users"); 


$consultica = mysqli_query($conexion, "SELECT * FROM expenses
WHERE id_person = $usuario"); 
$inc = 0;
while ($consult = mysqli_fetch_array($consultica)) {
    $id_c = $consult['id_category'];
    $array_value[$inc] = $consult['value_expenses'];

    $consultica2 = mysqli_query($conexion, "SELECT * FROM category_user
    WHERE id_person = $usuario and id_category = $id_c"); 
    while ($consult2 = mysqli_fetch_array($consultica2)) {
        $name_c[$inc] = $consult2['category_name'];
    }
    $inc++;
}
$datosY = json_encode($array_value);
$datosX = json_encode($name_c);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.plot.ly/plotly-2.27.0.min.js" charset="utf-8"></script>
    <title>Grafica 1</title>
</head>
<body>

    <form action="" method="post">
        <select name="user" >
            <option value="">seleccione un usuario</option>
            <?php
            while ($con_user = mysqli_fetch_array($query_users)) {
                $cc = $con_user['id_person'];
                $name_u = $con_user['names'];
                $lastname_u = $con_user['lastname']; 

                echo'
                    <option value="'.$cc.'">'.$name_u.' '.$lastname_u.'</option>
                ';
            }
            ?>
        </select>
        <input type="submit" value="graficar" name="datos">
    </form>

    <div id="grafiquita"></div>

    <script>
        function crearArreglo(json) {
            var parsed = JSON.parse(json);
            var arr = [];
            for(var x in parsed){
                arr.push(parsed[x]);
            }
            return arr;
        }
    </script>
  
    <script>

    $datosX = crearArreglo('<?php echo $datosX ?>');
    $datosY = crearArreglo('<?php echo $datosY ?>');

        var trace1 = {
        x: $datosX,
        y: $datosY,
        name: 'SF Zoo',
        type: 'bar'
        };


        var data = [trace1];

        var layout = {barmode: 'group'};

        Plotly.newPlot('grafiquita', data, layout);
    </script>
</body>
</html>