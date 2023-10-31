<script>

$datosX = crearArreglo('<?php echo $datosX ?>');
$datosY = crearArreglo('<?php echo $datosY ?>');

    var trace1 = {
    x: $datosX,
    y: $datosY,
    type: 'scatter'
    };


    var data = [trace1];

    Plotly.newPlot('grafica2', data);
</script>
