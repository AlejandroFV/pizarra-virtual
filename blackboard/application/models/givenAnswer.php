<?php

/**
 * Class RespuestaDada
 */
class GivenAnswer
{
  /**
   * @var int
   */
  private $id;
  /**
   * @var Equation
   */
  private $equation;
  /**
   * @var User
   */
  private $user;
  /**
   * @var String
   */
  private $answer;
  /**
   * @var int
   */
  private $attempt;

  /**
   * RespuestaDada constructor.
   */
  public function __construct() {}

  /**
   * @return int
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * @param int $id
   */
  public function setId($id)
  {
    $this->id = $id;
  }

  /**
   * @return Equation
   */
  public function getEquation()
  {
    return $this->equation;
  }

  /**
   * @param Equation $equation
   */
  public function setEquation($equation)
  {
    $this->equation = $equation;
  }

  /**
   * @return User
   */
  public function getUser()
  {
    return $this->user;
  }

  /**
   * @param User $user
   */
  public function setUser($user)
  {
    $this->user = $user;
  }

  /**
   * @return String
   */
  public function getAnswer()
  {
    return $this->answer;
  }

  /**
   * @param String $answer
   */
  public function setAnswer($answer)
  {
    $this->answer = $answer;
  }

  /**
   * @return int
   */
  public function getAttempt()
  {
    return $this->attempt;
  }

  /**
   * @param int $attempt
   */
  public function setAttempt($attempt)
  {
    $this->attempt = $attempt;
  }
}