<?php

 function getFiles(){

include_once 'conexion_bd.php';




     $sql = "SELECT * FROM tbl_file_uploads";
     if($_SESSION["role"]=='alumno'){
         $id=$_SESSION["id"];
         $sqlSelectGroup="SELECT * FROM student where id_user='$id'";

         $row = mysqli_fetch_assoc(mysqli_query($oLink, $sqlSelectGroup));
         $grupo=$row["group"];
         $sql = "SELECT * FROM tbl_file_uploads where workgroup='$grupo'";

     }
     $query = mysqli_query($oLink,$sql);
      


     return $query;
 }
?>