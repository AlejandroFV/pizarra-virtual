<?php
require_once('../model/likelyAnswer.php');
require_once('../daos/likelyAnswerDao.php');

class LikelyAnswerController
{
  private $likelyAnswerDao;

  /**
   * LikelyAnswerController constructor.
   */
  public function __construct()
  {
    $this->likelyAnswerDao = new LikelyAnswerDao();
  }

  private function buildLikelyAnswer($query_result)
  {
    if ($query_result and $query_result->num_rows > 0) {
      $temp = mysqli_fetch_array($query_result, MYSQLI_ASSOC);
      $likelyAnswerObject = new LikelyAnswer();

      $likelyAnswerObject->setEquation($temp['equation']);
      $likelyAnswerObject->setLikelyAnswer($temp['likely_answer']);
      $likelyAnswerObject->setMessage($temp['message']);
      $likelyAnswerObject->setCount($temp['count']);

      return $likelyAnswerObject;
    } else {
      return null;
    }

  }

  public function createLikelyAnswer($equation, $answer, $message)
  {
    $equationA = $equationJ = $equationO = $equation;
    $equations = [];
    $equationA = str_replace('x', 'a', $equationA);
    $equationA = str_replace('y', 'b', $equationA);
    $equationA = str_replace('z', 'c', $equationA);
    $equationA = str_replace('w', 'd', $equationA);
    array_push($equations, $equationA);

    $equationJ = str_replace('x', 'i', $equationJ);
    $equationJ = str_replace('y', 'j', $equationJ);
    $equationJ = str_replace('z', 'k', $equationJ);
    $equationJ = str_replace('w', 'l', $equationJ);
    array_push($equations, $equationJ);

    $equationO = str_replace('x', 'm', $equationO);
    $equationO = str_replace('y', 'n', $equationO);
    $equationO = str_replace('z', 'o', $equationO);
    $equationO = str_replace('w', 'p', $equationO);
    array_push($equations, $equationO);

    array_push($equations, $equation);

    $answerA = $answerJ = $answerO = $answer;
    $answers = [];
    $answerA = str_replace('x', 'a', $answerA);
    $answerA = str_replace('y', 'b', $answerA);
    $answerA = str_replace('z', 'c', $answerA);
    $answerA = str_replace('w', 'd', $answerA);
    array_push($answers, $answerA);

    $answerJ = str_replace('x', 'i', $answerJ);
    $answerJ = str_replace('y', 'j', $answerJ);
    $answerJ = str_replace('z', 'k', $answerJ);
    $answerJ = str_replace('w', 'l', $answerJ);
    array_push($answers, $answerJ);

    $answerO = str_replace('x', 'm', $answerO);
    $answerO = str_replace('y', 'n', $answerO);
    $answerO = str_replace('z', 'o', $answerO);
    $answerO = str_replace('w', 'p', $answerO);
    array_push($answers, $answerO);

    array_push($answers, $answer);
    $result = null;
    for ($i = 0; $i < sizeof($equations); $i++) {
      $result = $this->likelyAnswerDao->createLikelyAnswer($equations[$i], $answers[$i], $message);
      if ($result == false) {
        return false;
      }
    }

    return $this->getLikelyAnswer($equation, $answer);
  }

  public function getLikelyAnswer($equation, $answer)
  {
    $result = $this->likelyAnswerDao->getLikelyAnswer($equation, $answer);

    return $this->buildLikelyAnswer($result);
  }

  public function updateLikelyAnswer($equation, $answer, $message, $count)
  {
    $result = $this->likelyAnswerDao->updateLikelyAnswer($equation, $answer, $message, $count);

    return $this->buildLikelyAnswer($result);
  }

  public function deleteLikelyAnswer($equation, $message = null)
  {
    return $this->likelyAnswerDao->deleteLikelyAnswer($equation, $message);
  }
}