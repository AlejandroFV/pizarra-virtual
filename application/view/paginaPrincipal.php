<?php
session_start();
if ($_SESSION["valida"] == true) {
	if ($_SESSION["role"] == 'tutor') {
		header('Location: tutor.php');
	} else {
		if ($_SESSION["role"] == 'admin') {
			header('Location: admin.php');
		} else {
			if ($_SESSION["role"] == 'alumno') {
				header('Location: alumno.php');
			}
		}
	}
} else {
	header('Location: login.php');
}
?>