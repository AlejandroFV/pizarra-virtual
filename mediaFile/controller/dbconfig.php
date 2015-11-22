<?php
$host = "localhost";
$usuario = "root";
$pass = "";
$db = "archivos_ajax";
$oLink=mysql_connect($host, $usuario, $pass) or die('no se puede conectar al servidor');
mysql_select_db($db) or die('problema al seleccionar la base de datos');
?>