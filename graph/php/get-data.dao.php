<?php 

/*
* Connection
*/
$sDBServer = "localhost";
$sDBName = "testGraph";
$sDBUsername = "root";
$sDBPassword = "";

$link = mysqli_connect($sDBServer, $sDBUsername, $sDBPassword, $sDBName);

$query_select = "SELECT * FROM graphGeneral";

$query_result = mysqli_query($link, $query_select);

$row = mysqli_fetch_array($query_result);

$goods = $row["goods"];
$bads = $row["bads"];

$arrayGraphGeneral = [] ;
array_push($arrayGraphGeneral, $goods);
array_push($arrayGraphGeneral, $bads);

$myfile = fopen("../data/graphGeneralData.txt", "w");

fwrite($myfile, "");

for ($currentData = 0 ; $currentData < sizeof($arrayGraphGeneral) ; $currentData++ ) { 
	$data = $arrayGraphGeneral[$currentData] . "\n";
	fwrite($myfile, $data);
}
