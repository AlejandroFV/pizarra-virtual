<?php 

/*
* Connection
*/
$sDBServer = "localhost";
$sDBName = "proyecto_ajax";
$sDBUsername = "root";
$sDBPassword = "";

$link = mysqli_connect($sDBServer, $sDBUsername, $sDBPassword, $sDBName);

$query_select1 = "SELECT sum(count) as total_bads FROM likely_answers";
$query_select2 = "SELECT sum(attempts) as total_ansewers FROM given_answers";

$query_result1 = mysqli_query($link, $query_select1);
$query_result2 = mysqli_query($link, $query_select2);

$file_generalData = fopen("../../data/graphGeneralData.txt", "w");

fwrite($file_generalData, "");

$total_bads = 0;
$total_goods = 0;

/*Obtener primero las mlas de todos*/
if ( mysqli_num_rows($query_result1) > 0 ) {
	while ( $row1 = mysqli_fetch_array($query_result1) ) {
			$total_bads = $row1[0]."\n";
			fwrite($file_generalData, $total_bads);
	}
}

/*Obtener segundo las buenas de todos*/
if ( mysqli_num_rows($query_result2) > 0 ) {
	while ( $row2 = mysqli_fetch_array($query_result2) ) {
			$total_goods = $row2[0]-$total_bads."\n";
			fwrite($file_generalData, $total_goods);
	}
}

mysqli_close($link);