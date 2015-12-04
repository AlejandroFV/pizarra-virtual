<?php 

$sDBServer = "localhost";
$sDBName = "proyecto_ajax";
$sDBUsername = "root";
$sDBPassword = "";

$link = mysqli_connect($sDBServer, $sDBUsername, $sDBPassword, $sDBName);

$query_select = "SELECT likely_answer FROM likely_answers";

$query_result = mysqli_query($link, $query_select);


$file_typeErrorName = fopen("../../data/graphTypeErrorName.txt", "w");
fwrite($file_typeErrorName, "");

if ( mysqli_num_rows($query_result) > 0 ) {
	while ( $row = mysqli_fetch_array($query_result) ) {
			$line = $row[0]."\n";
			fwrite($file_typeErrorName, $line);
		}	
}else{
	echo "0 results";
}

mysqli_close($link);