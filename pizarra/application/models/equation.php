<?php

/**
 * Class Equation
 */
class Equation
{

  /**
   * @var String
   */
  private $equation;

  /**
   * @var String
   */
  private $answer;

  /**
   * ProductoNotable constructor.
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

  
}