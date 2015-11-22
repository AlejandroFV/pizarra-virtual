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
  
  public function getEquations() {
    $query = "SELECT * FROM equations;";
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
}