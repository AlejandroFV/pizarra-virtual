<?php
include_once '../controller/dbconfig.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">

<title>Visualizar los Archivos</title>
<link rel="stylesheet" href="../assets/css/style.css" type="text/css" />
<script type="text/javascript">
    function visualizar(id){
          //gets table
    var oTable = document.getElementById('tabla');

    var rowLength = oTable.rows.length;

    
    for (i = 1; i < rowLength; i++){
  
     oCells = oTable.rows.item(i).cells;
       if(oCells.item(0).innerHTML==id){
        break;
       }

  }


    var nombreArchivo=oCells.item(1).innerHTML;
    var tipoArchivo=oCells.item(2).innerHTML;

     var divContentMedia=document.getElementById("mediaDiv");
     divContentMedia.innerHTML="";
     switch(tipoArchivo){
        case "wmv":
        case "mp4":
        case "webm":
        case "ogg":
            divContentMedia.innerHTML="<video controls > <source src=\"../assets/uploads/"+nombreArchivo+"."+tipoArchivo+" \"  type=\"video/"+tipoArchivo+"\"></video>";
        break;

         case "txt":
        case "pdf":
            divContentMedia.innerHTML="<iframe id=\"frame\" name=\"iframe_a\" src=\"../assets/uploads/"+nombreArchivo+"."+tipoArchivo+" \" ></iframe>";
        break;

        case "png":
        case "jpg":
        case  "jpeg":
            divContentMedia="<img src=\"../assets/uploads/"+nombreArchivo+"."+tipoArchivo+" \" >";
        break;

        default:
             divContentMedia.innerHTML="<H1>No se puede visualizar el archivo.</H1>";

        break;
     }   
 }
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
    <td></td>
    <td></td>
    </tr>

    <!-- Función para obtener el grupo del alumno -->

    <!--Si es alumno, que se vean sólo los archivos de su grupo:
            $sql = "SELECT * FROM tbl_file_uploads WHERE workbook = ' *grupo del alumno* '";
            
        Si no es alumno, se muestran todos
            $sql = "SELECT * FROM tbl_file_uploads";
    -->

    <?php
	$sql = "SELECT * FROM tbl_file_uploads";
	$query = mysql_query($sql);
	while($row = mysql_fetch_array($query)){
		?>
        <form action="../controller/modifyFileController.php" method ="post">
            <tr>
                <td><input type="text" name="id" value="<?php echo $row['id'] ?>" readonly/>
                </td>
                <td><?php echo $row['file'] ?></td>
                <td><?php echo $row['type'] ?></td>
                <td><?php echo $row['size'] ?> kb</td>
                <td>
                    <select name="grupo">
                        <option value="1"> 1 </option>
                        <option value="5"> 5 </option>
                        <option value="6"> 12 </option>
                        <?php echo '<option selected>'.$row['workgroup'] .'</option>'?>

                    </select>


                </td>
                <td><a onclick="visualizar(<?php echo $row['id']?>);return false;" target="">Visualizar</td>
                <td><a href="../assets/uploads/<?php echo $row['file'] . '.' . $row['type']?>" target="no">Descargar</a></td>
                <td><input type="submit" name="delete" value="Delete" /></td>
                <td><input type="submit" name="edit" value="Edit" /></td>

            </tr>
        </form>

        <?php
	}

	?>
    </table>


    <?php
    if(isset($_POST['deleteItem']) and is_numeric($_POST['deleteItem'])){
        $id_del = $_POST['deleteItem'];
        $sqldel = "DELETE FROM `archivos_ajax`.`tbl_file_uploads` WHERE `tbl_file_uploads`.`id` = $id_del";
        mysql_query($sqldel);
    }
    ?>
        <a href="addFileView.php">Subir más archivos</a><br><br>

    <div id="mediaDiv">

    </div>
    
   

</div>
</body>
</html>