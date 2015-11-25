<?php
include_once 'conexion_bd.php';


    if(isset($_POST['delete']) ){
    	$id = $_POST['id'];
        $sqldel = "DELETE FROM `tbl_file_uploads` WHERE `id` = $id";
        mysqli_query($oLink,$sqldel);

        $sqlSelectFile= "SELECT * FROM tbl_file_uploads where ='$id'";
        $row = mysqli_fetch_assoc(mysqli_query($oLink, $sqlSelectFile));
        $folder = "../../assets/uploads/";
        $file=$row["file"];
        $ext=$row["type"];
        unlink($folder.$file.".".$ext);

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