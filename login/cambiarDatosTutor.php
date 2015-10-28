<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
if ($_SESSION["valida"] == false && $_SESSION["role"] != 'tutor') {
    header('Location: login.php');
}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
    <title>Modificar Tutor</title>
    <link rel="stylesheet" type="text/css" href="css/proyecto.css">
    <script type="text/javascript" src="js/zxml.js"></script>
    <script type="text/javascript">
        var realizar = 1;

        function sendRequest() {
            var oForm = document.forms[0];
            var sBody = getRequestBody(oForm);
            var oXmlHttp = zXmlHttp.createRequest();
            oXmlHttp.open("post", oForm.action, true);
            oXmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            oXmlHttp.onreadystatechange = function () {
                if (oXmlHttp.readyState == 4) {
                    if (oXmlHttp.status == 200) {
                        saveResult(oXmlHttp.responseText);

                    } else {
                        saveResult("Ocurrio un error: " + oXmlHttp.statusText)
                    }
                }
            };
            oXmlHttp.send(sBody);
        }

        function getRequestBody(oForm) {
            //funcion que devuelve una cadena de consulta
            var aParams = new Array();
            for (var i = 0; i < oForm.elements.length; i++) {
                var sParam = encodeURIComponent(oForm.elements[i].name);
                sParam += "=";
                sParam += encodeURIComponent(oForm.elements[i].value);
                aParams.push(sParam);
            }
            //sParam = encodeURIComponent("realizar");
            //sParam += "=";
            //sParam += encodeURIComponent(realizar.toString());
            aParams.push(sParam);
            return aParams.join("&");
        }

        function saveResult(sMensaje) {

            var divStatus = document.getElementById("divStatus");
            divStatus.innerHTML = sMensaje;


        }

        function salir() {
            window.location = "login.php";
        }


    </script>
</head>

<body>
<form action="backend/modificarTutor.php" method="post" onsubmit="sendRequest();
                return false">
    <table id="formulario">
        <tbody>
        <tr>
            <td colspan="4"><h1>Modificar Datos</h1></td>
        </tr>
        <tr>
            <td colspan="2"><label>Nombre:</label></td>
            <td colspan="2"><input name="nom" class="esp" type="text" required/></td>
        </tr>
        <tr>
            <td colspan="2"><label>Apellido:</label></td>
            <td colspan="2"><input name="ap" class="esp" type="text" required/></td>
        </tr>
        <tr>
            <td colspan="2"><label>Mail:</label></td>
            <td colspan="2"><input name="mail" class="esp" type="email" required/></td>
        </tr>
        <tr>
            <td colspan="2">
                <label>Genero:</label></td>
            <td><select name="sex" class="esp" required>
                    <option value="hombre">hombre</option>
                    <option value="mujer">mujer</option>
                </select></td
        </tr>
        <tr>
            <td colspan="2"><label>Contrasena:</label></td>
            <td colspan="2"><input name="pass" class="esp" type="password" required/></td>
        </tr>

        <tr>
            <td><input type="submit" value="Aceptar" name="btnEnviar"/></td>
            <td><input type="button" value="Salir" name="btnSalir" onclick="salir()"/></td>
        </tr>
        </tbody>
    </table>
</form>
<div id="divStatus"></div>
</body>
</html>



