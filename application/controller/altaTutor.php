<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$id = $_POST["mat"];
$name = $_POST["nom"];
$last_name = $_POST["ap"];
$gender = $_POST["sex"];
$email = $_POST["mail"];
$password = $_POST["pass"];
$status = "";

include 'conexion_bd.php';
//alta
$sql1 = mysqli_query($oLink, "SELECT * FROM user WHERE id = " . $id);

if (mysqli_affected_rows($oLink) > 0) {
    $status = "Esta Matricula ya esta Registrada";
} else {
    $sql1 = "INSERT INTO user(`id`, `password`, `name`, `last_name`, `email`,`gender`, `role`) VALUES ('$id','$password','$name','$last_name','$email','$gender','tutor')";

    if ($status == "") {
        if ($oResult1 = mysqli_query($oLink, $sql1)) {
            $status = "Tutor Registrado";
        } else {
            $status = "Ocurrió un error al registrar al Tutor, el Tutor no fue agregado";
        }
    }
    mysqli_close($oLink);
}
echo $status;
?>


