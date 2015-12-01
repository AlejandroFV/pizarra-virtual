<?php
require_once('../model/equation.php');
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
      $result = $this->equationDao->createEquation($equations[$i], str_replace(' ', '', $answers[$i]));
      if ($result == false) {
        return false;
      }
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
    session_start();
    if (isset($_SESSION['id'])) {
      $result = $this->equationDao->getEquations($_SESSION['id']);
      if ($result and $result->num_rows > 0) {
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

    return null;
  }

  public function getAllEquations()
  {
    $result = [
      'groups' => [],
      'ungrouped' => [],
      'grouped' => [],
    ];
    // GROUPS
    $group_result = $this->equationDao->getGroups();
    $groups = [];
    if ($group_result and $group_result->num_rows > 0) {
      for ($i = 0; $i < $group_result->num_rows; $i++) {
        $temp = mysqli_fetch_array($group_result, MYSQLI_ASSOC);
        array_push($groups, $temp['group']);
      }
    }
    $result['groups'] = $groups;
    
    // UNGROUPED EQUATIONS
    $ungrouped_result = $this->equationDao->getUngroupedEquations();
    $ungrouped_equations = [];
    if ($ungrouped_result and $ungrouped_result->num_rows > 0) {
      while ($row = $ungrouped_result->fetch_assoc()) {
        $equation = new Equation();
        $equation->setEquation($row['equation']);
        $equation->setAnswer($row['answer']);

        array_push($ungrouped_equations, $equation);
      }
    }
    $result['ungrouped'] = $ungrouped_equations;
    
    // GROUPED EQUATIONS
    $grouped_result = $this->equationDao->getGroupedEquations();
    $temp_grouped_equations = [];
    $equations = [];
    if ($grouped_result and $grouped_result->num_rows > 0) {
      while ($row = $grouped_result->fetch_assoc()) {
        $equation = new Equation();
        $equation->setEquation($row['equation']);
        $equation->setAnswer($row['answer']);

        array_push($temp_grouped_equations, [$equation, $row['group']]);
        array_push($equations, $equation);
      }
    }
    $grouped_equations = [];
    $temp_equations = [];
    foreach ($temp_grouped_equations as $equation) {
      if (($grouped_equations == []) or (in_array($equation[0], $temp_equations) === false)) {
        array_push($temp_equations, $equation[0]);
        $indexes = array_keys($equations, $equation[0]);
        $groups = [];
        foreach ($indexes as $index) {
          array_push($groups, $temp_grouped_equations[$index][1]);
        }
        array_push($grouped_equations, [$equation[0], $groups]);
      }
    }
    $result['grouped'] = $grouped_equations;

    return $result;
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

  public function assignEquation($equation, $group)
  {
    return $this->equationDao->assignEquation($equation, $group);
  }

  public function unassignEquation($equation, $group)
  {
    return $this->equationDao->unassignEquation($equation, $group);
  }
}