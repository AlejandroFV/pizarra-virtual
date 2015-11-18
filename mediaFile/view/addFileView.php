
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- Esta página es sólo para el tutor -->
<meta charset="utf-8">
<title>Subir archivos</title>
<link rel="stylesheet" href="../assets/css/style.css" type="text/css" />
</head>
<body>

<div id="header">
	<h1>Seleccione el archivo a subir</h1>
</div>

<div id="body">
	<form action="../controller/addFileController.php" method="post" enctype="multipart/form-data">
		<input type="file" name="file"/><br><br>
		<label>Grupo: </label><input type="text" name="group" style="width:30px;" maxlength="3" required><br><br>
		<button type="submit" name="enviar-archivo">Enviar ahora</button>
	</form>

    <br><br><br>
    <?php
    // modifica el mensaje de la página
	if(isset($_GET['exito'])){
		?>
        <label>El archivo se ha subido sin problemas.</label>
        <?php
	} else if(isset($_GET['error'])) {
		?>
        <label>Error al subir el archivo.</label>
        <?php
	} else {
		?>
        <label>El tamaño máximo de los archivos se puede cambiar en el php.ini</label>
        <?php
	}
	?>
</div>
	<br>
	<a href="indexFileView.php">Ir a la Vista</a>

<div id="footer">
	<label>Equipo: Abner Collí y Víctor Sosa</label>
</div>
</body>
</html>