var nameTypeError = [];
var totalNames = 0;

function generateTypeErrorDataName(){
	var request = $.ajax({
			url: "../../data/graphTypeErrorName.txt",
			type: "get",
			success : successTypeErrorGraphName,
			error : errorTypeErrorGraphName
	});
}

function successTypeErrorGraphName(response){
	var array = response.split("\n");

	for (var i = 0; i < array.length-1; i++) {
	      	var name = array[i];
	      	nameTypeError.push(name);
	      	totalNames++;
      }
      redimentionGraph();
}

function errorTypeErrorGraphName(){
	console.log("Error");
}

function redimentionGraph(){
	$("#barChartTypeError").css({
		height: totalNames*50
	});
}