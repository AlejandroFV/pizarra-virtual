<?php 

/*
* Connection
*/
$sDBServer = "localhost";
$sDBName = "proyecto_ajax";
$sDBUsername = "root";
$sDBPassword = "";

$link = mysqli_connect($sDBServer, $sDBUsername, $sDBPassword, $sDBName);

$query_select = "SELECT count FROM likely_answers";

$query_result = mysqli_query($link, $query_select);

$row = mysqli_fetch_array($query_result);

/*
$error1 = $row["error1"];
$error2 = $row["error2"];
$error3 = $row["error3"];
$error4 = $row["error4"];

$arrayGraphTypeError = [] ;

array_push($arrayGraphTypeError, $error1);
array_push($arrayGraphTypeError, $error2);
array_push($arrayGraphTypeError, $error3);
array_push($arrayGraphTypeError, $error4);
*/



$file_errorData = fopen("../data/graphTypeErrorData.txt", "w");
fwrite($file_errorData, "");

if ( mysqli_num_rows($query_result) > 0 ) {
	while ( $row = mysqli_fetch_array($query_result) ) {
			$line = $row[0]."\n";
			fwrite($file_errorData, $line);
		}	
}else{
	echo "0 results";
}

/*
for ($currentData = 0 ; $currentData < sizeof($arrayGraphTypeError) ; $currentData++ ) { 
	$data = $arrayGraphTypeError[$currentData] . "\n";
	fwrite($file_errorData, $data);
}
*/
