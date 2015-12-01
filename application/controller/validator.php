<?php
require_once('../controller/equationController.php');
require_once('../controller/givenAnswerController.php');
require_once('../controller/likelyAnswerController.php');
$equationController = new EquationController();
$equations = $equationController->getEquations();
session_start();
$messages = "";
$attempt = $_POST['attempts'];
if ($equations !== null and isset($_SESSION['id'])) {
  $i = 0;
  $givenAnswerController = new GivenAnswerController();
  $error = false;
  foreach ($equations as $equation) {
    $answer = $_POST['answer' . $i];
    $answer = str_replace(' ', '', $answer);
    $givenAnswerObject = $givenAnswerController->createGivenAnswer($equation->getEquation(), $_SESSION['id'], $answer);
    $correct = strcasecmp($answer, $equation->getAnswer());
    if ($correct == 0) {
      $messages .= '<strong class="correct"><i class="fa fa-check"></i></strong>Respuesta correcta@';
    } else if ($attempt < 3) {
      $likelyAnswerController = new LikelyAnswerController();
      $likelyAnswer = $likelyAnswerController->getLikelyAnswer($equation->getEquation(), $answer);
      if ($likelyAnswer === null) {
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
echo ($messages !== "")? $attempt . "@" . $messages : "An error ocurred";
