<?php
include'../controller/dbconfig.php';



 function getFiles(){
     $grupo="";
/*
 * quitar comentarios cuando se integre al mismo nivel
 include_once'../controller/conexion_bd.php';
$id=$_SESSION["group"];
$result=mysqli_query($oLink,"$SELECT * student where id=$id");
$row=$result->fetch_assoc();
$grupo=$row["group"];
*/
     $sql = "SELECT * FROM tbl_file_uploads";
     if($_SESSION["role"]='alumno'){
         //$sql = "SELECT * FROM tbl_file_uploads where id='$grupo'";

     }
     $query = mysql_query($sql);



     return $query;
 }
?>