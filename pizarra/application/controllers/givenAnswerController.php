<?php
require_once('../models/givenAnswer.php');
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
    $result = $this->givenAnswerDao->createGivenAnswer($equation, $user_id,  $answer);
    if ($result == false) {
      return false;
    }

    return $result;
  }

  public function deleteGivenAnswer($equation, $user_id,  $givenAnswer)
  {
    return $this->givenAnswerDao->deleteGivenAnswer($equation, $user_id, $givenAnswer);
  }
}