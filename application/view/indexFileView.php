<?php
session_start();
if ($_SESSION["valida"] == true   ) {
    $role=$_SESSION["role"];
    include_once('../controller/indexFileController.php');
}else{
    header('Location: login.php');

}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">

<title>Visualizar Archivos</title>
<link rel="stylesheet" href="../../assets/css/style.css" type="text/css" />
<script type="text/javascript" src="../../assets/js/verArchivos.js"></script>
<script type="text/javascript" src="../../assets/js/zxml.js"></script>

<script type="text/javascript">

</script>

</head>
<body>

<div id="header">
    <h1>Archivos Disponibles</h1>
</div>

<div id="body">

	<table id="tabla">
    <tr style="background-color:black; color:white;">
    <td>ID</td>
    <td>Nombre del Archivo</td>
    <td>Tipo</td>
    <td>Tamaño</td>
    <td>Grupo</td>
    <td>Ver</td>
    <td>Descargar</td>
        <?php

        if($role != 'alumno'){
            echo "<td></td><td></td>";
        }

        ?>

    </tr>
    <div id="files">
        <?php
        
        
        $files=getFiles();
        while($row = mysqli_fetch_array($files)){
            ?>
            <form action="../controller/modifyFileController.php" method ="post">
                <tr>
                    <td><input type="text" name="id" value="<?php echo $row['id'] ?>" readonly/>
                    </td>
                    <td><?php echo $row['file'] ?></td>
                    <td><?php echo $row['type'] ?></td>
                    <td><?php echo $row['size'] ?> kb</td>
                    <td>
                        <input type="text" name="id" value="<?php echo $row['id'] ?>" />

                    </td>
                    <td><a onclick="visualizar(<?php echo $row['id']?>);return false;" href="" target="">Visualizar</a></td>
                    <td><a href="../../assets/uploads/<?php echo $row['file'] . '.' . $row['type']?>" target="no">Descargar</a></td>
                    <?php
                    if($role != 'alumno'){
                        echo "<td><input type=\"submit\" name=\"delete\" value=\"Delete\" /></td>";

                        echo  "<td><input type=\"submit\" name=\"edit\" value=\"Edit\" /></td>";
                    }?>

                </tr>
            </form>
        <?php
        }
        ?>
    </div>
    </table>


        <a href="addFileView.php">Subir más archivos</a><br><br>

    <div id="mediaDiv">

    </div>
    
   

</div>
</body>
</html>