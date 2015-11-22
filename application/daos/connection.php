<?php
define('SERVER'		 ,'localhost');
define('USER'		 ,'root');
define('PASSWORD'	 ,'');
define('DB_NAME'	 ,'proyecto_ajax');

function ejecutar_query($query){
  $connection = mysqli_connect(SERVER, USER, PASSWORD, DB_NAME) or die ("Error " . mysqli_error($connection));
  return mysqli_query($connection, $query);
}