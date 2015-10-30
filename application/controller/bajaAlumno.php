<?php

//Iniciamos la sesion
session_start();
include 'conexion_bd.php';

//query para eliminar
$sql1 = "DELETE FROM `student` WHERE id_user='$_SESSION[id]'";
$sql2 = "DELETE FROM `user` WHERE id='$_SESSION[id]'";
if ($oResult1 = mysqli_query($oLink, $sql1) && $oResult2 = mysqli_query($oLink, $sql2)) {
    header('Location: login.php');
} else {
    echo "no se elimino";
}
?>