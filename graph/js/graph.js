
function Graph(){
    /*-----------------------------------------------
    *   Variables to graph 1
    ------------------------------------------------*/
    this.typeError = null;  //Axis X
    this.valuesGraph1 = null;  //Axis Y

    /*-----------------------------------------------
    *   Variables to graph 2
    ------------------------------------------------*/
    this.generalData = null;  //Axis X
    this.valuesGraph2 = null;  //Axis Y

    this.generateData = function(){
        /*-------------------------------------------------------------------------------------------
        *   For the first Grpah [Grpah Type Error]
        --------------------------------------------------------------------------------------------*/
        //Axis X
        this.typeError = ["Error 1", "Error 2", "Error 3", "Error 4"];

        //Axis Y
        this.valuesGraph1 = [ 2, 6, 7, 10 ];


        /*-------------------------------------------------------------------------------------------
        *   For the second Grpah [Grpah General Data]
        --------------------------------------------------------------------------------------------*/

        //Axis X
        this.generalData = ["Buenas", "Malas"];

        //Axis Y
        this.valuesGraph2 = [ 23, 13 ];

    }

    /*
    *   Build the the first Grpah [Grpah Type Error]
    */
    this.createGraphTypeError = function(){
        $.jqplot.config.enablePlugins = true;
        
        plot1 = $.jqplot('barChartTypeError', [ this.valuesGraph1 ], {
            // Only animate if we're not using excanvas (not in IE 7 or IE 8)..
            title: 'Tipos de error',

            animate: !$.jqplot.use_excanvas,
            seriesDefaults : {
                renderer:$.jqplot.BarRenderer,
                rendererOptions: {
                    // Set the varyBarColor option to true to use different colors for each bar.
                    // The default series colors are used.
                    varyBarColor: true
                },
                pointLabels: { show: true }
            },
            axes: {
                xaxis: {
                    label:'Tipos de error',
                    renderer: $.jqplot.CategoryAxisRenderer,
                    ticks: this.typeError
                },
                yaxis:{
                  label:'Número de personas'
                }
            },
            highlighter: { show: false }
        });

        $('#barChartTypeError').bind('jqplotDataClick', 
            function (ev, seriesIndex, pointIndex, data) {
                $('#info1').html('series: '+seriesIndex+', point: '+pointIndex+', data: '+data);
            }
        );

    },

    this.createGraphGeneralData = function (){
        $.jqplot.config.enablePlugins = true;
         
        plot1 = $.jqplot('barChartGeneralData', [ this.valuesGraph2 ], {
            // Only animate if we're not using excanvas (not in IE 7 or IE 8)..
            title: 'Datos generales',
            animate: !$.jqplot.use_excanvas,
            seriesDefaults:{
                renderer:$.jqplot.BarRenderer,
                rendererOptions: {
                    // Set the varyBarColor option to true to use different colors for each bar.
                    // The default series colors are used.
                    varyBarColor: true
                },
                pointLabels: { show: true }
            },
            axes: {
                xaxis: {
                    label:'Casos de éxito y error',
                    renderer: $.jqplot.CategoryAxisRenderer,
                    ticks: this.generalData
                },
                yaxis:{
                    label:'Número de personas'
                }
            },
            highlighter: { show: false }
        });
     
        $('#barChartGeneralData').bind('jqplotDataClick', 
            function (ev, seriesIndex, pointIndex, data) {
                $('#info2').html('series: '+seriesIndex+', point: '+pointIndex+', data: '+data);
            }
        );
    }
}