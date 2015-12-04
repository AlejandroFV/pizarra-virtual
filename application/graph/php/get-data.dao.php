<?php 

/*
* Connection
*/
$sDBServer = "localhost";
$sDBName = "proyecto_ajax";
$sDBUsername = "root";
$sDBPassword = "";

$link = mysqli_connect($sDBServer, $sDBUsername, $sDBPassword, $sDBName);

$query_select1 = "SELECT * FROM metrics";

$query_result1 = mysqli_query($link, $query_select1);

$file_generalData = fopen("../../data/graphGeneralData.txt", "w");

fwrite($file_generalData, "");

/*Obtener primero las mlas de todos*/
if ( mysqli_num_rows($query_result1) > 0 ) {
	while ( $row = mysqli_fetch_array($query_result1) ) {
			$line = $row[5]."\n34";
			fwrite($file_generalData, $line);
	}
}