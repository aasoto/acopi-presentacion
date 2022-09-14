if ($("#indicadores")) {
    if (document.getElementById("indicadores")) {
        var indicadores = JSON.parse($("#indicadores").val());
        var total_indicadores = $("#totalIndicadores").val();

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

        /** RECIBOS GENERADOS **/

        var recibos_generados = "[";

        for (var i = 0; i < total_indicadores; i++) {
            if (i < total_indicadores - 1) {
                recibos_generados = recibos_generados + indicadores[i]["recibos_generados"] + ", ";
            } else {
                recibos_generados = recibos_generados + indicadores[i]["recibos_generados"] + "]";
            }
        }

        console.log("String: ", recibos_generados);
        var datos_recibos_generados = JSON.parse(recibos_generados);
        console.log("Array: ", datos_recibos_generados);

        /** RECIBOS PAGOS **/

        var recibos_pagos = "[";

        for (var i = 0; i < total_indicadores; i++) {
            if (i < total_indicadores - 1) {
                recibos_pagos = recibos_pagos + indicadores[i]["recibos_pagos"] + ", ";
            } else {
                recibos_pagos = recibos_pagos + indicadores[i]["recibos_pagos"] + "]";
            }
        }

        console.log("String: ", recibos_pagos);
        var datos_recibos_pagos = JSON.parse(recibos_pagos);
        console.log("Array: ", datos_recibos_pagos);

        /** RECIBOS PENDIENTES **/

        var recibos_pendientes = "[";

        for (var i = 0; i < total_indicadores; i++) {
            if (i < total_indicadores - 1) {
                recibos_pendientes = recibos_pendientes + indicadores[i]["recibos_pendientes"] + ", ";
            } else {
                recibos_pendientes = recibos_pendientes + indicadores[i]["recibos_pendientes"] + "]";
            }
        }

        console.log("String: ", recibos_pendientes);
        var datos_recibos_pendientes = JSON.parse(recibos_pendientes);
        console.log("Array: ", datos_recibos_pendientes);

        /** RECIBOS NEGOCIADOS **/

        var recibos_negociados = "[";

        for (var i = 0; i < total_indicadores; i++) {
            if (i < total_indicadores - 1) {
                recibos_negociados = recibos_negociados + indicadores[i]["recibos_negociados"] + ", ";
            } else {
                recibos_negociados = recibos_negociados + indicadores[i]["recibos_negociados"] + "]";
            }
        }

        console.log("String: ", recibos_negociados);
        var datos_recibos_negociados = JSON.parse(recibos_negociados);
        console.log("Array: ", datos_recibos_negociados);

        /*--=====  End of TRATAMIENTO DE DATOS  ======--*/

        //--------------
        //- AREA CHART -
        //--------------

        // Get context with jQuery - using jQuery's .get() method.

        var areaChartData = {
            labels: datos_meses,
            datasets: [{
                label: 'Recibos generados',
                backgroundColor: 'rgba(57,140,184,0.9)',
                borderColor: 'rgba(57,140,184,0.8)',
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(57,140,184,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(57,140,184,1)',
                data: datos_recibos_generados
            },
            {
                label: 'Recibos pagos',
                backgroundColor: 'rgba(21, 147, 81, 1)',
                borderColor: 'rgba(21, 147, 81, 1)',
                pointRadius: false,
                pointColor: 'rgba(21, 147, 81, 1)',
                pointStrokeColor: '#c1c7d1',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(21, 147, 81,1)',
                data: datos_recibos_pagos
            },
            {
                label: 'Recibos pendientes',
                backgroundColor: 'rgba(219, 52, 68, 1)',
                borderColor: 'rgba(219, 52, 68, 1)',
                pointRadius: false,
                pointColor: 'rgba(219, 52, 68, 1)',
                pointStrokeColor: '#c1c7d1',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(219, 52, 68,1)',
                data: datos_recibos_pendientes
            },
            {
                label: 'Recibos negoceados',
                backgroundColor: 'rgba(255, 255, 0, 1)',
                borderColor: 'rgba(255, 255, 0, 1)',
                pointRadius: false,
                pointColor: 'rgba(255, 255, 0, 1)',
                pointStrokeColor: '#c1c7d1',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(255, 255, 0, 1)',
                data: datos_recibos_negociados
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
        lineChartData.datasets[3].fill = false;
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
        var temp3 = areaChartData.datasets[3]
        barChartData.datasets[0] = temp3
        barChartData.datasets[1] = temp2
        barChartData.datasets[2] = temp1
        barChartData.datasets[3] = temp0

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
                    'Recibos pagos',
                    'Recibos pendientes',
                    'Recibos negociados',
                ],
                datasets: [
                    {
                        data: [indicadores[i-1]["recibos_pagos"], indicadores[i-1]["recibos_pendientes"], indicadores[i-1]["recibos_negociados"]],
                        backgroundColor: ['#00a65a', '#db3444', '#ffff00'],
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

}
