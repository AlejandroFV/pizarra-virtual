<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

$name = $_POST["nom"];
$last_name = $_POST["ap"];
$gender = $_POST["sex"];
$email = $_POST["mail"];
$specialty = $_POST["carrera"];
$longitude = $_POST["lat"];
$latitude = $_POST["long"];
$password = $_POST["pass"];
$status = "";

include 'conexion_bd.php';


//Modificaciones

$sql1 = mysqli_query($oLink, "SELECT * FROM student WHERE id_user = " . $_SESSION["id"]);


if (mysqli_affected_rows($oLink) == 0) {
    $status = "No existe el alumno a modificar";
} else {

    //ESTE UPDATE NO ESTA FUNCIONANDO SOLO ACTUALIZA LA TABLA USER PERO NO LA TABLA STUDENT
    $sql2 = "Update `student` Set `id_user`='$_SESSION[id]', `specialty`='$specialty', `latitude`='$latitude', `longitude`='$longitude' Where id_user = " . $_SESSION["id"];
    $sql3 = "Update `user` Set `password`='$password', `name`='$name', `last_name`='$last_name', `email`='$email', `gender`='$gender', `role`='alumno' Where id = " . $_SESSION["id"];
    if ($status != "") {
        if ($oResult1 = mysqli_query($oLink, $sql3)) {
            if ($oResult2 = mysqli_query($oLink, $sql2)) {
                $status = "Cambios Realizados";
            } else {
                $status = "Ocurrió un error al realizar los cambio, los datos no fueron modificados";
            }
        } else {
            $status = "Ocurrió un error al realizar los cambio, los datos no fueron modificados";
        }
    }
    mysqli_close($oLink);
}
echo $status;
?>


