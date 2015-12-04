var valuesGraph2 = [];
var plot2;

function generateGeneralData(){
	var request = $.ajax({
			url: "../../data/graphGeneralData.txt",
			type: "get",
			success : successGeneralGraph,
			error : errorGeneralGraph
	});
	/*-------------------------------------------------------------------------------------------
	*   For the second Grpah [Grpah General Data]
	--------------------------------------------------------------------------------------------*/
	this.generalData = ["Buenas", "Malas"];

	//Axis Y
	//this.valuesGraph2 = [ 23, 13 ];
}

function successGeneralGraph(response){
	var array = response.split("\n");

      for (var i = 0; i < array.length-1; i++) {
      	//var currentNumber = parseInt(valuesGraph2[i]);
      	var numericValue = parseInt(array[i]);
      	valuesGraph2.push(numericValue);
      }
      createGraphGeneralData();
}

function errorGeneralGraph(){
	console.log("Error");
}

function destroyGeneralGraph(){
	if (plot2) {
		plot2.destroy();
	}
}

function createGraphGeneralData(){
	$.jqplot.config.enablePlugins = true;
	 
	plot2 = $.jqplot('barChartGeneralData', [ valuesGraph2 ], {
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