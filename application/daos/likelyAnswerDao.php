<?php
require_once('../daos/connection.php');

class LikelyAnswerDao
{
  public function createLikelyAnswer($equation, $answer, $message)
  {
    $query = "INSERT INTO likely_answers (equation, likely_answer, message, count)  VALUES ('$equation', '$answer', '$message', 0);";
    return ejecutar_query($query);
  }

  public function getLikelyAnswer($equation, $answer)
  {
    $query = "SELECT * FROM likely_answers WHERE equation = '$equation' AND likely_answer = '$answer';";
    return ejecutar_query($query);
  }

  public function updateLikelyAnswer($equation, $answer, $message, $count)
  {
    $query = "UPDATE likely_answers SET message = '$message', count = $count WHERE equation = '$equation' AND likely_answer = '$answer';";
    return ejecutar_query($query);
  }

  public function deleteLikelyAnswer($equation, $message = null)
  {
    if ($message !== null) {
      $query = "DELETE FROM likely_answers WHERE equation = '$equation' AND message = '$message';";
    } else {
      $query = "DELETE FROM likely_answers WHERE equation = '$equation';";
    }
    return ejecutar_query($query);
  }
}