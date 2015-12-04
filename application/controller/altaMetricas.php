<?php
	session_start();
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
  	include 'conexion_bd.php';
	/*try{
		if( isset($_POST['sltExpresion']) && $_POST['sltExpresionType'] !== ''){*/
	    //Obtener el id de la sesión activa
      $id = $_SESSION["id"];
      //$id = '001';
      $dateMetric = $_POST["dtFecha"];
		  $expr = $_POST["sltExpresion"];
		  $exprType = $_POST["sltExpresionType"];
		  $numMist = $_POST["nbrNumeroErrores"];
	    $mistakes = $_POST["editorErrores"];
      $frequency = $_POST["frecuenciaErrores"];
		  $startHr = $_POST["nbrHrInicio"];
		  $startMin = $_POST["nbrMinInicio"];
		  $endHr = $_POST["nbrHrFin"];
		  $endMin = $_POST["nbrMinFin"];

		  //echo $mistakes;
		  //Obtener la hora de inicio y fin
		  $startTime = $startHr.':'.$startMin;
		  $endTime = $endHr.':'.$endMin;
		  //$startTimeConverted = STR_TO_DATE($startTime, '%H:%i');
		  //echo ($startTime);
		  //echo ($startTimeConverted);
		  $status = "";

		  //Registro de la información de métricas
		  $sql = "INSERT INTO metrics(id_user, dateMetric, expression, expressionType, numMistakes, mistakes, frequency, startTime, endTime) VALUES ('$id', '$dateMetric', '$expr', '$exprType', '$numMist', '$mistakes', '$frequency', '$startTime', '$endTime')";
		  
	    /*$db_url = 'mysql:host='.$sDBServer.';dbname='.$sDBName;

		  $link = new PDO($db_url, 
			              $sDBUsername, 
			              $sDBPassword,  
			              array(
			                  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
			              ));
		  $handle = $link->prepare('INSERT INTO metrics(id_user, dateMetric, expression, expressionType, numMistakes, mistakes, frequency, startTime, endTime) VALUES (:id, :dateMetric, :expr, :exprType, :numMist, :mistakes, :frequency, :startTime, :endTime)');

		  $handle->bindParam(':id', $id);
      $handle->bindParam(':dateMetric', $dateMetric);
		  $handle->bindParam(':expr', $expr);
		  $handle->bindParam(':exprType', $exprType);
		  $handle->bindParam(':numMist', $numMist);
	    $handle->bindParam(':mistakes', $mistakes);
      $handle->bindParam(':frequency', $frequency);
		  $handle->bindParam(':startTime', $startTime);
		  $handle->bindParam(':endTime', $endTime);

		  $handle->execute();*/
		  if ($status=="") {
		  	if ($oResult = mysqli_query($oLink, $sql) or die(mysqli_error($oLink))) {
			  $status = "Información registrada";
		  	} else {
			  $status = "Ocurrió un error al registrar las métricas.";
		  	}
		  }
		  
		  //$status = "Información registrada";
		  mysqli_close($oLink);
			/*  echo json_encode(true);
		  }else{
			  echo json_encode(false);
		  }*/
		  echo $status;
	/*}
	catch(PDOException $ex){
		error_log($ex->getMessage());
	    echo($ex->getMessage());
	}*/
?>