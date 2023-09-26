var trace1 = {
    x: [-1, 2, 3, 4],
    y: [1, 15, -45, 100],
    type: 'scatter'
    };

    var trace2 = {
    x: [1, 2, 3, 4],
    y: [100, 45, 15, 1],
    type: 'scatter'
    };

    var data = [trace1, trace2];

    Plotly.newPlot('MiGrafiquita', data);