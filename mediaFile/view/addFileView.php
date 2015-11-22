<?php
//Se toma en cuenta que ya se inicio sesion con una cuenta diferente de alumno para que funcione esta vista.
session_start();
 if ($_SESSION["valida"] == false || $_SESSION["role"] == 'alumno') {
     header('Location: login.php');

}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- Esta página es sólo para el tutor -->
<meta charset="utf-8">
<title>Subir archivos</title>
<link rel="stylesheet" href="../assets/css/style.css" type="text/css" />
<script type="text/javascript" src="../assets/js/zxml.js"></script>
    <script src="http://localhost/ajax/pizarra-virtual/mediaFile/controller/addFileController.php"></script>
<script type="text/javascript" >
    "use strict";

    function ajaxSuccess () {
        saveResult(this.responseText);
    }

    function sendRequest(oFormElement) {
        if (!oFormElement.action) { return; }
        var oReq = new XMLHttpRequest();
        oReq.onload = ajaxSuccess;
        if (oFormElement.method.toLowerCase() === "post") {
            oReq.open("post", oFormElement.action);
            oReq.send(new FormData(oFormElement));
        } else {

        }
    }


    function saveResult(sMensaje) {

        switch (sMensaje) {

            case 'exito':
                var divStatus = document.getElementById("divStatus");
                divStatus.innerHTML = "<label>El archivo se ha subido sin problemas</label>";
                break;
            case 'error':
                var divStatus = document.getElementById("divStatus");
                divStatus.innerHTML = "<label>Error al subir archivo</label>";
                break;
            default :
                var divStatus = document.getElementById("divStatus");
                divStatus.innerHTML = sMensaje;
        }
    }
</script>
</head>
<body>

<div id="header">
	<h1>Seleccione el archivo a subir</h1>
</div>

<div id="body">
	<form action="../controller/addFileController.php" method="post" onsubmit="sendRequest(this);return false;" enctype="multipart/form-data">
		<input type="file" id="file" name="file"/><br><br>
		<label>Grupo: </label><input type="text" name="group" value="" style="width:30px;" maxlength="3" required><br><br>
		<button type="submit" name="enviar-archivo">Enviar ahora</button>
	</form>

    <br><br><br>
<div id="divStatus"></div>
</div>

	<a href="indexFileView.php">Ir a la Vista</a>

<div id="footer">
	<label>Equipo: Abner Collí y Víctor Sosa</label>
</div>
</body>
</html>