<?php
require_once('../controller/equationController.php');
require_once('../controller/givenAnswerController.php');
require_once('../controller/likelyAnswerController.php');
$equationController = new EquationController();
$equations = $equationController->getEquations();
session_start();
$messages = "";
//and isset($_SESSION['matricula'])
if ($equations !== null ) {
  $i = 0;
  $givenAnswerController = new GivenAnswerController();
  foreach ($equations as $equation) {
    $answer = $_POST['answer' . $i];
    $answer = str_replace(' ', '', $answer);
    $givenAnswerObject = $givenAnswerController->createGivenAnswer($equation->getEquation(), $_SESSION['matricula'], $answer);
    $correct = strcasecmp($answer, $equation->getAnswer());
    if ($correct == 0) {
      $messages .= '<strong class="correct"><i class="fa fa-check"></i></strong>Respuesta correcta@';
    } else {
      $likelyAnswerController = new LikelyAnswerController();
      $likelyAnswer = $likelyAnswerController->getLikelyAnswer($equation->getEquation(), $answer);
      if ($likelyAnswer === null) {
        $messages .= '<strong class="error"><i class="fa fa-exclamation"></i></strong>Revisa tu resultado@';
      } else {
        $likelyAnswerController->updateLikelyAnswer($equation->getEquation(),$answer, $likelyAnswer->getMessage(), ($likelyAnswer->getCount()+1));
        $messages .= '<strong class="error"><i class="fa fa-exclamation"></i></strong>' . $likelyAnswer->getMessage() . '@';
      }
    }
    $i++;
  }
}
echo ($messages !== "")? $messages : "An error ocurred";
