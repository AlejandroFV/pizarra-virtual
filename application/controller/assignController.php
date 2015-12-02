<?php
require_once('../controller/equationController.php');
$equationController = new EquationController();
$equations = $equationController->getAllEquations();
error_reporting(0);
$ids = [
  'ungrouped' => [],
  'grouped' => []
];
for ($i = 0; $i < sizeof($equations['ungrouped']); $i++) {
  foreach ($equations['groups'] as $group) {
    $id = "ue" . $i . "g" . $group;
    array_push($ids['ungrouped'], $id);
  }
}
for ($i = 0; $i < sizeof($equations['grouped']); $i++) {
  foreach ($equations['groups'] as $group) {
    $id = "e" . $i . "g" . $group;
    array_push($ids['grouped'], $id);
  }
}

foreach ($ids['grouped'] as $grouped) {
  $assign = ($_POST[$grouped] == true)? true : false;
  $equation_index = explode('e', (explode('g', $grouped)[0]))[1];
  $group = explode('g', $grouped)[1];
  if ($assign) {
    $equationController->assignEquation($equations['grouped'][$equation_index][0]->getEquation(), $group);
  } else {
    $equationController->unassignEquation($equations['grouped'][$equation_index][0]->getEquation(), $group);
  }
}

foreach ($ids['ungrouped'] as $ungrouped) {
  $assign = ($_POST[$ungrouped] == true)? true : false;
  $equation_index = explode('ue', (explode('g', $ungrouped)[0]))[1];
  $group = explode('g', $ungrouped)[1];
  if ($assign) {
    $equationController->assignEquation($equations['ungrouped'][$equation_index]->getEquation(), $group);
  } else {
    $equationController->unassignEquation($equations['ungrouped'][$equation_index]->getEquation(), $group);
  }
}

echo'<script type="text/javascript">alert("Asignacion realizada"); document.location.href="../view/assignEquations.php";</script>';

//header('location: ../view/assignEquations.php');