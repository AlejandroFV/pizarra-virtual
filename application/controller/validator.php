<?php
require_once('../controller/equationController.php');
require_once('../controller/givenAnswerController.php');
require_once('../controller/likelyAnswerController.php');
$equationController = new EquationController();
$equations = $equationController->getEquations();
session_start();
$messages = "";
$attempt = $_POST['attempts'];
function normalizeEquation($eq)
{
  $eq = str_replace('a', 'x', $eq);
  $eq = str_replace('i', 'x', $eq);
  $eq = str_replace('m', 'x', $eq);

  $eq = str_replace('b', 'y', $eq);
  $eq = str_replace('j', 'y', $eq);
  $eq = str_replace('n', 'y', $eq);

  $eq = str_replace('c', 'z', $eq);
  $eq = str_replace('k', 'z', $eq);
  $eq = str_replace('o', 'z', $eq);

  $eq = str_replace('d', 'w', $eq);
  $eq = str_replace('l', 'w', $eq);
  $eq = str_replace('p', 'w', $eq);
  
  return $eq;
}
if ($equations !== null and isset($_SESSION['matricula'])) {
  $i = 0;
  $givenAnswerController = new GivenAnswerController();
  $error = false;
  $result = 0;
  foreach ($equations as $equation) {
    $answer = $_POST['answer' . $i];
    $answer = str_replace(' ', '', $answer);
    $givenAnswerObject = $givenAnswerController->createGivenAnswer($equation->getEquation(), $_SESSION['id'], $answer);
    $correct = strcasecmp($answer, $equation->getAnswer());
    if ($correct == 0) {
      $messages .= '<strong class="correct"><i class="fa fa-check"></i></strong>Respuesta correcta@';
      $result++;
    } else if ($attempt < 3) {
      $likelyAnswerController = new LikelyAnswerController();
      $likelyAnswer = $likelyAnswerController->getLikelyAnswer($equation->getEquation(), $answer);
      if ($likelyAnswer === null) {
        $str_equation = normalizeEquation($equation->getEquation());
        $likelyAnswerController->createLikelyAnswer($str_equation, $answer, 'Revisa tu resultado');
        $likelyAnswerController->updateLikelyAnswer($equation->getEquation(),$answer, 'Revisa tu resultado', 1);
        $messages .= '<strong class="error"><i class="fa fa-exclamation"></i></strong>Revisa tu resultado@';
      } else {
        $likelyAnswerController->updateLikelyAnswer($equation->getEquation(),$answer, $likelyAnswer->getMessage(), ($likelyAnswer->getCount()+1));
        $messages .= '<strong class="error"><i class="fa fa-exclamation"></i></strong>' . $likelyAnswer->getMessage() . '@';
      }
      $error = true;
    } else {
      $messages .= '<strong class="error"><i class="fa fa-check"></i></strong>' . $equation->getAnswer() . '@';
      $error = true;
    }
    $i++;
  }
  if ($error) {
    $attempt++;
  }
}
echo ($messages !== "")? $attempt . "@" . $result . "@" . $messages : "An error ocurred";
