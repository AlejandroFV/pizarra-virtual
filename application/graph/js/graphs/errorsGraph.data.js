var valuesTypeErrorGraph = [];
var plot1;

function generateTypeErrorData(){
	var request = $.ajax({
			url: "../../data/graphTypeErrorData.txt",
			type: "get",
			success : successTypeErrorGraph,
			error : errorTypeErrorGraph
	});
	/*-------------------------------------------------------------------------------------------
	*   For the first Grpah [Grpah Type Error]
	--------------------------------------------------------------------------------------------*/
	//Axis X
	this.typeError = ["Error 1", "asdasd 2", "Error 3", "Error 4"];
}

function successTypeErrorGraph(response){
	var array = response.split("\n");

      for (var i = 0; i < array.length-1; i++) {
        	var numericValue = parseInt(array[i]);
        	valuesTypeErrorGraph.push(numericValue);
      }
      createGraphTypeError();
}

function errorTypeErrorGraph(){
	console.log("Error");
}

function destroyGraphErrors(){
    if (plot1) {
        plot1.destroy();
    }
}

function createGraphTypeError(){
        $.jqplot.config.enablePlugins = true;
        
        plot1 = $.jqplot('barChartTypeError', [ valuesTypeErrorGraph ], {
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
                    ticks: nameTypeError
                },
                yaxis:{
                  label:'Veces falladas',
                  labelRenderer: $.jqplot.CanvasAxisLabelRenderer
                }
            },
            highlighter: { show: false }
        });

        $('#barChartTypeError').bind('jqplotDataClick', 
            function (ev, seriesIndex, pointIndex, data) {
                $('#info1').html('series: '+seriesIndex+', point: '+pointIndex+', data: '+data);
            }
        );

    }