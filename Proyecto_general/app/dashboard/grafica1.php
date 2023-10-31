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

    var layout = {
        title: 'Valor proyectado de categorías en el mes',
        height: 350,
        width: 350,
        showlegend: false,
        grid: {rows: 1, columns: 1}
    };

Plotly.newPlot('grafica1', data, layout);
</script>
