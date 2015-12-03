<?php

//Iniciamos la sesion
session_start();
//Conexion
include 'conexion_bd.php';
$matricula = $_POST["mat"];
$sql1 = mysqli_query($oLink, "SELECT * FROM user WHERE id = " . $matricula);

//query para eliminar
$sql1 = "DELETE FROM student WHERE id_user = '$matricula'";
$sql2 = "DELETE FROM user WHERE id = '$matricula'";


if (mysqli_affected_rows($oLink) == 0) {
    echo "Usuario No Existente";
} else {
    if ($oResult1 = mysqli_query($oLink, $sql1) && $oResult2 = mysqli_query($oLink, $sql2)) {
        echo "Usuario Eliminado con Exito";
    } else {
        echo "El usuario se encuentra relacionado con alguna dependencia (Respuestas dadas)";
    }
}
?>