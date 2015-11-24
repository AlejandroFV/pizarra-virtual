<?php
session_start();
header("Content-Type:text/plain");
$_SESSION["valida"] = false;
$_SESSION["role"] = "";
$_SESSION["name"] = "";
$_SESSION["last_name"] = "";

include 'conexion_bd.php';

$usuario = $_POST["usuario"];
$password = $_POST["password"];

$status = "";

//Creamos los querys
$query1 = "SELECT * FROM  user WHERE id = '" . $usuario . "' AND password = '" . $password . "'";
$query2 = "SELECT name, last_name,role FROM user WHERE id = '" . $usuario . "'";
//Realizamos la conexión


if ($status == "") {
    if ($oResult = mysqli_query($oLink, $query1) and mysqli_affected_rows($oLink) > 0) {
        $_SESSION["valida"] = true;
        $_SESSION["id"] = $usuario;
        $row = mysqli_fetch_assoc(mysqli_query($oLink, $query2));
        $_SESSION["role"] = $row['role'];
		$_SESSION["name"] = $row['name'];
		$_SESSION["last_name"] = $row['last_name'];
        $status = $_SESSION["role"];
    } else {
        $status = "No existe el usuario ";
    }
}

mysqli_close($oLink);
echo($status);
?>
