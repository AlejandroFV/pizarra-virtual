<?php



 function getFiles(){

include_once 'conexion_bd.php';
     $grupo="";

//$id=$_SESSION["group"];
//$result=mysqli_query($oLink,"SELECT * student where id=$id");
//$row=$result->fetch_assoc();
//$grupo=$row["group"];

     $sql = "SELECT * FROM tbl_file_uploads";
     if($_SESSION["role"]='alumno'){
         //$sql = "SELECT * FROM tbl_file_uploads where id='$grupo'";

     }
     $query = mysqli_query($oLink,$sql);
      


     return $query;
 }
?>