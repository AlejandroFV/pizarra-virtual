<?php
// 'matricula' is assigned to test the functionality
session_start();
$_SESSION['matricula'] = 1;
header('location: application/views/blackboard.php');
?>