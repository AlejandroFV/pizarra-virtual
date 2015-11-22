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
    $result = $this->likelyAnswerDao->createLikelyAnswer($equation, $answer, $message);

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