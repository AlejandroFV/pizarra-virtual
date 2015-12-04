<?php 

session_start();

//Carga el php para agarrar los datos 
require("../get-errors.dao.php");
require("../get-data.dao.php");
require("../get-type-error-name.php");

if (session_status() == PHP_SESSION_ACTIVE) {
	//SI ya iniciaste sesión muestra las gráficas
	require("graphs.view.php");
}else{
	//Si no has iniciado sesión haz otra cosa
	echo "No has iniciado sesión";
}