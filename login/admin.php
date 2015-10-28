<!DOCTYPE html>
<?php
session_start();
if ($_SESSION["valida"] == false && $_SESSION["role"] != 'admin') {
    header('Location: login.php');
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>ADMIN</title>
    <link rel="stylesheet" type="text/css" href="css/tarea1.css">
    <script type="text/javascript" src="js/jquery-1.11.3.js"></script>
    <script type="text/javascript" src="js/zxml.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script type="text/javascript">
        function cerrarSesion() {
            document.location.href = "login.php";
        }

        function irAeliminarCuentaTutor() {
            document.location.href = "eliminarUsuario.php";
        }

        function irAregistrarTutor() {
            document.location.href = "registrarTutor.php";
        }


    </script>
</head>

<body>

<!--Formulario a rellenar-->
<div id="login">
    <h1>Pizarra Virtual (Dar Formato/Estilo)</h1>

    <form id="menu">
        </br></br></br>
        <input class="gestionBtn" type="button" value="Cerrar Sesion" onclick="cerrarSesion();">
        <input type="button" onclick="irAregistrarTutor();" value="RegistrarTutor"/>
        <input type="button" onclick="irAeliminarCuentaTutor();" value="EliminarCuenta"/>
    </form>
</body>
</html>


