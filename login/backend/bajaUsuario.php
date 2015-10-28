<?php

//Iniciamos la sesion
session_start();
//Conexion
include 'conexion_bd.php';

$sql1 = mysqli_query($oLink, "SELECT * FROM user WHERE id = " . $id);

//query para eliminar
$sql1 = "DELETE FROM `student` WHERE id_user=" . $id;
$sql2 = "DELETE FROM `user` WHERE id=" . $id;

if (mysqli_affected_rows($oLink) == 0) {
    echo "Usuario No Existente";
} else {
    if ($oResult1 = mysqli_query($oLink, $sql1) && $oResult2 = mysqli_query($oLink, $sql2)) {
        echo "Usuario Eliminado con Exito";
    } else {
        echo "Usuario No Eliminado";
    }
}
?>