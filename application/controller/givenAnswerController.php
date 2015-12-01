<?php
require_once('../model/givenAnswer.php');
require_once('../daos/givenAnswersDao.php');

class GivenAnswerController
{
  private $givenAnswerDao;

  /**
   * GivenAnswerController constructor.
   */
  public function __construct()
  {
    $this->givenAnswerDao = new GivenAnswersDao();
  }

  public function createGivenAnswer($equation, $user_id,  $answer)
  {
    $givenAnswer = $this->getGivenAnswer($equation, $user_id);
    if ($givenAnswer == null) {
      $result = $this->givenAnswerDao->createGivenAnswer($equation, $user_id, $answer);
      if ($result == false) {
        return false;
      }
    } else {
      $result = $this->givenAnswerDao->updateGivenAnswer($equation, $user_id, $answer, $givenAnswer->getAttempt() + 1);
      if ($result == false) {
        return false;
      }
    }

    return $result;
  }

  public function deleteGivenAnswer($equation, $user_id,  $givenAnswer)
  {
    return $this->givenAnswerDao->deleteGivenAnswer($equation, $user_id, $givenAnswer);
  }

  public function getGivenAnswer($equation, $user_id)
  {
    $result = $this->givenAnswerDao->getGivenAnswer($equation, $user_id);

    return $this->buildGivenAnswer($result);
  }

  private function buildGivenAnswer($query_result)
  {
    if ($query_result and $query_result->num_rows > 0) {
      $temp = mysqli_fetch_array($query_result, MYSQLI_ASSOC);
      $givenAnswer = new GivenAnswer();

      $givenAnswer->setId($temp['id']);
      $givenAnswer->setEquation($temp['equation']);
      $givenAnswer->setUser($temp['user']);
      $givenAnswer->setAnswer($temp['answer']);
      $givenAnswer->setAttempt($temp['attempts']);

      return $givenAnswer;
    }

    return null;
  }
}