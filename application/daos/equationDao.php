<?php
require_once('../daos/connection.php');

class EquationDao
{


  /**
   * EquationDao constructor.
   */
  public function __construct()
  {
  }

  public function createEquation($equation, $answer)
  {
    $query = "INSERT INTO equations (equation, answer) VALUES ('$equation', '$answer');";
    return ejecutar_query($query);
  }
  
  public function getEquation($equation)
  {
    $query = "SELECT * FROM equations WHERE equation = '$equation';";
    return ejecutar_query($query);
  }
  
  public function getEquations($id_user) {
    $query = "SELECT `group` FROM student WHERE id_user = '$id_user';";
    $query_result = ejecutar_query($query);
    $group = null;
    if ($query_result and $query_result->num_rows > 0) {
      $temp = mysqli_fetch_array($query_result, MYSQLI_ASSOC);
      $group = $temp['group'];
    }
    if ($group === null) {
      return null;
    } 

    $query = "SELECT * FROM equations INNER JOIN group_equation ON equations.equation = group_equation.equation WHERE group_equation.group = '$group';";
    return ejecutar_query($query);
  }
  
  public function getUngroupedEquations() {
    $query = "SELECT * FROM equations WHERE equation NOT IN (SELECT equation FROM group_equation);";
    return ejecutar_query($query);
  }
  
  public function getGroupedEquations() {
    $query = "SELECT * FROM equations INNER JOIN group_equation ON equations.equation = group_equation.equation;";
    return ejecutar_query($query);
  }
  
  public function getGroups()
  {
    $query = "SELECT DISTINCT `group` FROM student ORDER BY `group`;";
    return ejecutar_query($query);
  }
  
  public function updateAnswer($equation, $answer)
  {
    $query = "UPDATE equations SET answer = '$answer' WHERE equation = '$equation';";
    return ejecutar_query($query);
  }
  
  public function deleteEquation($equation)
  {
    $query = "DELETE FROM equations WHERE equation = '$equation';";
    return ejecutar_query($query);
  }
  
  public function assignEquation($equation, $group)
  {
    $query = "INSERT INTO group_equation VALUES ('$equation', '$group');";
    return ejecutar_query($query);
  }
  
  public function unassignEquation($equation, $group)
  {
    $query = "DELETE FROM group_equation WHERE equation = '$equation' AND `group` = '$group';";
    return ejecutar_query($query);
  }
} 
