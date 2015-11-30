<?php

/**
 * Class LikelyAnswer
 */
class LikelyAnswer
{
  /**
   * @var String
   */
  private $equation;
  /**
   * @var String
   */
  private $likelyAnswer;
  /**
   * @var String
   */
  private $message;
  /**
   * @var int
   */
  private $count;

  /**
   * PosibleResultado constructor.
   */
  public function __construct() {}

  /**
   * @return String
   */
  public function getEquation()
  {
    return $this->equation;
  }

  /**
   * @param String $equation
   */
  public function setEquation($equation)
  {
    $this->equation = $equation;
  }

  /**
   * @return String
   */
  public function getLikelyAnswer()
  {
    return $this->likelyAnswer;
  }

  /**
   * @param String $likelyAnswer
   */
  public function setLikelyAnswer($likelyAnswer)
  {
    $this->likelyAnswer = $likelyAnswer;
  }

  /**
   * @return String
   */
  public function getMessage()
  {
    return $this->message;
  }

  /**
   * @param String $message
   */
  public function setMessage($message)
  {
    $this->message = $message;
  }

  /**
   * @return int
   */
  public function getCount()
  {
    return $this->count;
  }

  /**
   * @param int $count
   */
  public function setCount($count)
  {
    $this->count = $count;
  }

  
}