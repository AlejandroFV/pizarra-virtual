<?php

include 'conexion_bd.php';

$long = $_POST['longitud'];
$lat = $_POST['latitud'];
$id = $_POST['id_alumn'];

if ($oLink->connect_errno) {
    echo "Connect failed: " . $oLink->connect_error;
    exit();
}
       $sql="UPDATE `student` SET `latitude`=$lat,`longitude`=$long WHERE id_user=$id";

        if($result = $oLink->query($sql)){

        }else{
            echo "ERROR: " . $oLink->error . "\n" . $sql . "\n";
        }


       
