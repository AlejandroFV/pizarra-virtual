<?php
include_once 'conexion_bd.php';

    if(isset($_POST['delete']) ){
    	$id = $_POST['id'];
        $sqldel = "DELETE FROM `archivos_ajax`.`tbl_file_uploads` WHERE `tbl_file_uploads`.`id` = $id";
        mysqli_query($oLink,$sqldel);

        header('location: ../view/indexFileView.php');

    }else{
        if(isset($_POST['edit'])){
            $id = $_POST['id'];
            $grupo=$_POST['grupo'];
            $sqldel = "UPDATE tbl_file_uploads SET workgroup='$grupo' WHERE id='$id'";
            mysqli_query($oLink,$sqldel);
        }

        header('location: ../view/indexFileView.php');

    }
?>