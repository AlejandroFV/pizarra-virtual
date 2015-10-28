<?php
session_start();
$_SESSION["valida"] = false;
$_SESSION["role"] = "";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
    <title>Captura de clientes</title>
    <link rel="stylesheet" type="text/css" href="css/proyecto.css">
    <script type="text/javascript" src="js/zxml.js"></script>
    <script type="text/javascript">

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
            return aParams.join("&");
        }

        function saveResult(sMensaje) {

            switch (sMensaje) {
                case 'alumno':
                    document.location.href = "alumno.php";
                    break;
                case 'tutor':
                    document.location.href = "tutor.php";
                    break;
                case 'admin':
                    document.location.href = "admin.php";
                    break;
                default :
                    var divStatus = document.getElementById("divStatus");
                    divStatus.innerHTML = sMensaje;
            }
        }
    </script>
</head>

<body>
<form action="backend/validarUsuario.php" method="post" onsubmit="sendRequest();
                return false">
    <table>
        <tbody>
        <tr>
            <td colspan="2"><h1>Iniciar Sesion</h1></td>
        </tr>
        <tr>
            <td><label>Matricula:</label></td>
            <td><input class="campo1" type="text" name="usuario" value="" required/></td>
        </tr>
        <tr>
            <td><label>Password:</label></td>
            <td><input class="campo1" type="password" name="password" value="" required/></td>
        </tr>
        <tr>
            <td><input type="submit" value="Entrar"/></td>
            <td><a href="registrarAlumno.php">Registrarse</a></td>
        </tr>
        </tbody>
    </table>
</form>
<div id="divStatus"></div>
</body>
</html>



