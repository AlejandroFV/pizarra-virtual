<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Gráficas</title>
	<link rel="stylesheet" href="../../../../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../../../assets/css/jquery.jqplot.css">

	<!--JQuery-->
	<script src="../../../../assets/js/jquery-1.11.3.js"></script>
	
	<!-- Build the graphs -->
	<script src="../../js/graphs/generalGraph.data.js"></script>
	<script src="../../js/graphs/generalData.name.js"></script>
	<script src="../../js/graphs/errorsGraph.data.js"></script>
	<script src="../../js/graphs/errorsGraph.name.js"></script>
	
	<!--Graph core-->
	<script src="../../js/lib_jqplot/jquery.jqplot.min.js" type="text/javascript"></script>

	<!-- Graph plugins -->
	<script src="../../js/lib_jqplot/plugins/jqplot.barRenderer.js"></script>
	<script src="../../js/lib_jqplot/plugins/jqplot.pieRenderer.js"></script>
	<script src="../../js/lib_jqplot/plugins/jqplot.categoryAxisRenderer.js"></script>
	<script src="../../js/lib_jqplot/plugins/jqplot.pointLabels.js"></script>
	
	<!-- Function to display the graph -->
	<script>
		function displayGeneralGraph(){
			destroyGeneralGraph();
			generateGeneralData();
		}

		function displayTypeErrorGraph(){
			destroyGraphErrors();
			generateTypeErrorDataName();
			generateTypeErrorData();

		}
	</script>

</head>
<body>
	
	<div class="container" id="content-container">
		
		<!--========================AQUI VA TODOOO===========================-->
		
		<div class="jumbotron text-center">
			<h1 class="text-center">Gráficas</h1>
			<p class="text-info">En esta sección se mostrarán las gráficas que proporcionaran al profesor como es que se están comportando los resultados de la prueba.</p> 
		</div>

		<div class="col-md-12 text-center">
			<h2 class="text-info text-center">Tabla de tipos de error</h2>
			<button onclick="displayTypeErrorGraph()" class="btn btn-primary">Mostrar gráffica de errores</button>
			<div id="barChartTypeError" style="width:1000px; height:600px;"></div>
			<h2 id="info1" class="text-center bg-primary"></h2>
		</div>

		<div class="col-md-12 text-center">
			<h2 class="text-info text-center">Tabla de datos generales</h2>
			<button onclick="displayGeneralGraph()" class="btn btn-primary">Mostrar gráfica deneral</button>
			<div id="barChartGeneralData" style="width:500px; height:600px"></div>
			<h2 id="info2" class="text-center bg-primary"></h2>
		</div>
		
	</div>
</body>
</html>