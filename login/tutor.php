<!DOCTYPE html>
<?php
session_start();
if ($_SESSION["valida"] == false && $_SESSION["role"] != 'tutor') {
    header('Location: login.php');
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>ALUMNO</title>
    <link rel="stylesheet" type="text/css" href="css/tarea1.css">
    <script type="text/javascript" src="js/jquery-1.11.3.js"></script>
    <script type="text/javascript" src="js/zxml.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script type="text/javascript">
        function cerrarSesion() {

            document.location.href = "login.php";
        }

        function irAcambiarDatos() {
            document.location.href = "cambiarDatosTutor.php";
        }


    </script>
</head>

<body>

<!--Formulario a rellenar-->
<div id="login">
    <h1>Pizarra Virtual (Dar Formato/Estilo)</h1>

    <form id="menu">
        </br></br></br>
        <input class="gestionBtn" type="button" value="Cerrar Sesion" onclick="cerrarSesion()"/>
        <input class="gestionBtn" type="button" value="Modificar Datos" onclick="irAcambiarDatos()()"/>

    </form>


</body>
</html>


