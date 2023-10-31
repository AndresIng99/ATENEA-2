<script>
$datoslabel = crearArreglo('<?php echo $datoslabel ?>');
$datosvalor = crearArreglo('<?php echo $datosvalor ?>');

    var data = [{
        values: $datosvalor,
        labels: $datoslabel,
        name: 'Categoría',
        hoverinfo: 'label+percent+name',
        hole: .4,
        type: 'pie'
    }];


Plotly.newPlot('grafica1', data);
</script>
