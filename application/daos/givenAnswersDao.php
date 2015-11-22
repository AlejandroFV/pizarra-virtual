<?php
require_once('../daos/connection.php');

class GivenAnswersDao
{
  public function createGivenAnswer($equation, $user_id, $answer)
  {
    $query = "INSERT INTO given_answers (equation, user, answer)  VALUES ('$equation', '$user_id', '$answer');";
    return ejecutar_query($query);
  }

  public function deleteGivenAnswer($equation, $user_id, $answer = null)
  {
    if ($answer !== null) {
      $query = "DELETE FROM given_answers WHERE equation = '$equation' AND user = $user_id AND answer = '$answer';";
    } else {
      $query = "DELETE FROM given_answers WHERE equation = '$equation' AND user = $user_id;";
    }
    return ejecutar_query($query);
  }
}