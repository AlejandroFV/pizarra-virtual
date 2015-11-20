<?php
require_once('../models/equation.php');
require_once('../daos/equationDao.php');

class EquationController
{
  private $equationDao;

  /**
   * EquationController constructor.
   */
  public function __construct()
  {
    $this->equationDao = new EquationDao();
  }

  private function buildEquation($query_result)
  {
    if ($query_result and $query_result->num_rows > 0) {
      $temp = mysqli_fetch_array($query_result, MYSQLI_ASSOC);
      $equationObject = new Equation();

      $equationObject->setEquation($temp['equation']);
      $equationObject->setAnswer($temp['answer']);

      return $equationObject;
    }
    
    return null;
  }

  public function createEquation($equation, $answer)
  {
    $result = $this->equationDao->createEquation($equation, $answer);
    if ($result == false) {
      return false;
    }
    
    return $this->buildEquation($result);
  }

  public function getEquation($equation)
  {
    $result = $this->equationDao->getEquation($equation);
    
    return $this->buildEquation($result);
  }

  public function getEquations()
  {
    $result = $this->equationDao->getEquations();
    if($result and $result->num_rows > 0) {
      $equations = [];
      while ($row = $result->fetch_assoc()) {
        $equationObject = new Equation();
        $equationObject->setEquation($row['equation']);
        $equationObject->setAnswer($row['answer']);

        array_push($equations, $equationObject);
      }
      return $equations;
    }

    return null;
  }

  public function updateEquation($equation, $answer)
  {
    $result = $this->equationDao->updateAnswer($equation, $answer);

    return $this->buildEquation($result);
  }

  public function deleteEquation($equation)
  {
    return $this->equationDao->deleteEquation($equation);
  }
}