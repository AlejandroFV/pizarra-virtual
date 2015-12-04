<?php
require_once('../daos/connection.php');

class GivenAnswersDao
{
  public function createGivenAnswer($equation, $user_id, $answer)
  {
    $query = "INSERT INTO given_answers (equation, user, answer, attempts)  VALUES ('$equation', '$user_id', '$answer', 1);";
    return ejecutar_query($query);
  }

  public function deleteGivenAnswer($equation, $user_id, $answer = null)
  {
    if ($answer !== null) {
      $query = "DELETE FROM given_answers WHERE equation = '$equation' AND user = '$user_id' AND answer = '$answer';";
    } else {
      $query = "DELETE FROM given_answers WHERE equation = '$equation' AND user = '$user_id';";
    }
    return ejecutar_query($query);
  }
  
  public function updateGivenAnswer($equation, $user_id, $answer, $attempt)
  {
    $query = "UPDATE given_answers SET attempts = '$attempt', answer = '$answer' WHERE equation = '$equation' AND user = '$user_id';";
    return ejecutar_query($query);
  }
  
  public function getGivenAnswer($equation, $user_id)
  {
    $query = "SELECT * FROM given_answers WHERE  equation = '$equation' AND user = '$user_id';";
    return ejecutar_query($query);
  }
} 
