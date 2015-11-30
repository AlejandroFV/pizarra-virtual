<?php
define('SERVER'		 ,'localhost');
define('USER'		 ,'root');
define('PASSWORD'	 ,'root');
define('DB_NAME'	 ,'db_equations');

function ejecutar_query($query){
  $connection = mysqli_connect(SERVER, USER, PASSWORD, DB_NAME) or die ("Error " . mysqli_error($connection));
  return mysqli_query($connection, $query);
}