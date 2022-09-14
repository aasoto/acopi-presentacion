if ($("#indicadoresEmpresas")) {

    var indicadores = JSON.parse($("#indicadoresEmpresas").val());
    var total_indicadores = $("#totalIndicadoresEmpresas").val();

    /*--==========================================
    =            TRATAMIENTO DE DATOS            =
    ==========================================--*/

    /** MESES **/
    var meses = "[";
    for (var i = 0; i < total_indicadores; i++) {
        if (i < total_indicadores - 1) {
            if (indicadores[i]["mes"] == 1) {
                meses = meses + '"Enero", ';
            }
            if (indicadores[i]["mes"] == 2) {
                meses = meses + '"Febrero", ';
            }
            if (indicadores[i]["mes"] == 3) {
                meses = meses + '"Marzo", ';
            }
            if (indicadores[i]["mes"] == 4) {
                meses = meses + '"Abril", ';
            }
            if (indicadores[i]["mes"] == 5) {
                meses = meses + '"Mayo", ';
            }
            if (indicadores[i]["mes"] == 6) {
                meses = meses + '"Junio", ';
            }
            if (indicadores[i]["mes"] == 7) {
                meses = meses + '"Julio", ';
            }
            if (indicadores[i]["mes"] == 8) {
                meses = meses + '"Agosto", ';
            }
            if (indicadores[i]["mes"] == 9) {
                meses = meses + '"Septiembre", ';
            }
            if (indicadores[i]["mes"] == 10) {
                meses = meses + '"Octubre", ';
            }
            if (indicadores[i]["mes"] == 11) {
                meses = meses + '"Noviembre", ';
            }
            if (indicadores[i]["mes"] == 12) {
                meses = meses + '"Diciembre", ';
            }
        } else {
            if (indicadores[i]["mes"] == 1) {
                meses = meses + '"Enero"]';
            }
            if (indicadores[i]["mes"] == 2) {
                meses = meses + '"Febrero"]';
            }
            if (indicadores[i]["mes"] == 3) {
                meses = meses + '"Marzo"]';
            }
            if (indicadores[i]["mes"] == 4) {
                meses = meses + '"Abril"]';
            }
            if (indicadores[i]["mes"] == 5) {
                meses = meses + '"Mayo"]';
            }
            if (indicadores[i]["mes"] == 6) {
                meses = meses + '"Junio"]';
            }
            if (indicadores[i]["mes"] == 7) {
                meses = meses + '"Julio"]';
            }
            if (indicadores[i]["mes"] == 8) {
                meses = meses + '"Agosto"]';
            }
            if (indicadores[i]["mes"] == 9) {
                meses = meses + '"Septiembre"]';
            }
            if (indicadores[i]["mes"] == 10) {
                meses = meses + '"Octubre"]';
            }
            if (indicadores[i]["mes"] == 11) {
                meses = meses + '"Noviembre"]';
            }
            if (indicadores[i]["mes"] == 12) {
                meses = meses + '"Diciembre"]';
            }
        }
    }
    console.log("String: ", meses);
    var datos_meses = JSON.parse(meses);
    console.log("Array: ", datos_meses);

    /** EMPRESAS ACTIVAS **/

    var empresas_activas = "[";

    for (var i = 0; i < total_indicadores; i++) {
        if (i < total_indicadores - 1) {
            empresas_activas = empresas_activas + indicadores[i]["empresas_activas"] + ", ";
        } else {
            empresas_activas = empresas_activas + indicadores[i]["empresas_activas"] + "]";
        }
    }

    console.log("String: ", empresas_activas);
    var datos_empresas_activas = JSON.parse(empresas_activas);
    console.log("Array: ", datos_empresas_activas);

    /** EMPRESAS INACTIVAS **/

    var empresas_inactivas = "[";

    for (var i = 0; i < total_indicadores; i++) {
        if (i < total_indicadores - 1) {
            empresas_inactivas = empresas_inactivas + indicadores[i]["empresas_inactivas"] + ", ";
        } else {
            empresas_inactivas = empresas_inactivas + indicadores[i]["empresas_inactivas"] + "]";
        }
    }

    console.log("String: ", empresas_inactivas);
    var datos_empresas_inactivas = JSON.parse(empresas_inactivas);
    console.log("Array: ", datos_empresas_inactivas);

    /** RECIBOS PENDIENTES **/

    var empresas_nuevas = "[";

    for (var i = 0; i < total_indicadores; i++) {
        if (i < total_indicadores - 1) {
            empresas_nuevas = empresas_nuevas + indicadores[i]["empresas_nuevas"] + ", ";
        } else {
            empresas_nuevas = empresas_nuevas + indicadores[i]["empresas_nuevas"] + "]";
        }
    }

    console.log("String: ", empresas_nuevas);
    var datos_empresas_nuevas = JSON.parse(empresas_nuevas);
    console.log("Array: ", datos_empresas_nuevas);

    /*--=====  End of TRATAMIENTO DE DATOS  ======--*/

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.

    var areaChartData = {
        labels: datos_meses,
        datasets: [{
            label: 'Empresas activas',
            backgroundColor: 'rgba(57,140,184,0.9)',
            borderColor: 'rgba(57,140,184,0.8)',
            pointRadius: false,
            pointColor: '#3b8bba',
            pointStrokeColor: 'rgba(57,140,184,1)',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(57,140,184,1)',
            data: datos_empresas_activas
        },
        {
            label: 'Empresas nuevas',
            backgroundColor: 'rgba(21, 147, 81, 1)',
            borderColor: 'rgba(21, 147, 81, 1)',
            pointRadius: false,
            pointColor: 'rgba(21, 147, 81, 1)',
            pointStrokeColor: '#c1c7d1',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(21, 147, 81,1)',
            data: datos_empresas_nuevas
        },
        {
            label: 'Empresas inactivas',
            backgroundColor: 'rgba(219, 52, 68, 1)',
            borderColor: 'rgba(219, 52, 68, 1)',
            pointRadius: false,
            pointColor: 'rgba(219, 52, 68, 1)',
            pointStrokeColor: '#c1c7d1',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(219, 52, 68,1)',
            data: datos_empresas_inactivas
        },
        ]
    }

    var areaChartOptions = {
        maintainAspectRatio: false,
        responsive: true,
        legend: {
            display: false
        },
        scales: {
            xAxes: [{
                gridLines: {
                    display: false,
                }
            }],
            yAxes: [{
                gridLines: {
                    display: false,
                }
            }]
        }
    }


    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    var lineChartOptions = $.extend(true, {}, areaChartOptions)
    var lineChartData = $.extend(true, {}, areaChartData)
    lineChartData.datasets[0].fill = false;
    lineChartData.datasets[1].fill = false;
    lineChartData.datasets[2].fill = false;
    lineChartOptions.datasetFill = false

    var lineChart = new Chart(lineChartCanvas, {
        type: 'line',
        data: lineChartData,
        options: lineChartOptions
    })

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    var temp2 = areaChartData.datasets[2]
    barChartData.datasets[0] = temp2
    barChartData.datasets[1] = temp1
    barChartData.datasets[2] = temp0

    var barChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        datasetFill: false
    }

    new Chart(barChartCanvas, {
        type: 'bar',
        data: barChartData,
        options: barChartOptions
    })

    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var meses = JSON.parse($("#meses").val());
    var total_meses = $("#totalMeses").val();

    for (var i = 1; i <= total_meses; i++) {
        var donutChartCanvas = $('#donutChart-'+i).get(0).getContext('2d')
        var donutData = {
            labels: [
                'Empresas activas',
                'Empresas nuevas',
                'Empresas inactivas',
            ],
            datasets: [
                {
                    data: [indicadores[i-1]["empresas_activas"], indicadores[i-1]["empresas_nuevas"], indicadores[i-1]["empresas_inactivas"]],
                    backgroundColor: ['#3c8dbc', '#00a65a', '#f56954'],
                }
            ]
        }
        var donutOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
        })
    }
}
