<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

$name = $_POST["nom"];
$last_name = $_POST["ap"];
$gender = $_POST["sex"];
$email = $_POST["mail"];
$password = $_POST["pass"];
$status = "root";

include 'conexion_bd.php';


//Modificaciones

$sql1 = mysqli_query($oLink, "SELECT * FROM user WHERE id = " . $_SESSION["id"]);


if (mysqli_affected_rows($oLink) == 0) {
    $status = "No existe el Tutor a modificar";
} else {
    $sql2 = "Update `user` Set `password`='$password', `name`='$name', `last_name`='$last_name', `email`='$email', `gender`='$gender', `role`='tutor' Where id = " . $_SESSION["id"];
  
        if ($oResult = mysqli_query($oLink, $sql2)) {
            $status = "Cambios Realizados";
        } else {
            $status = "Ocurrió un error al realizar los cambio, los datos no fueron modificados";
        }
    
    mysqli_close($oLink);
}
echo $status;
?>


