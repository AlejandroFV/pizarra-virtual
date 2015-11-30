<?php
require_once('../controllers/equationController.php');
require_once('../controllers/likelyAnswerController.php');

if (isset($_GET['equation'])) {
  $equation = $_GET['equation'];
  $answer = $_GET['answer'];
  $numberAnswers = $_GET['numberAnswers'];
  $likelyAnswers = [];

  $controller = new EquationController();
  $equationObject = $controller->createEquation($equation, $answer);

  for ($i = 0; $i <= $numberAnswers; $i++) {
    $likelyAnswer = $_GET['answer' . $i];
    $likelyMessage = $_GET['message' . $i];
    
    $likelyAnswerController = new LikelyAnswerController();
    $likelyAnswerObject = $likelyAnswerController->createLikelyAnswer($equation, $likelyAnswer, $likelyMessage);
    if ($likelyAnswerObject !== null) {
      array_push($likelyAnswers, $likelyAnswerObject);
    } else {
      print_r('Error fatal');
      break;
    }
  }
  
  if ($equationObject === false) {
    print_r('Error');
  } else {
    print_r('Success');
  }
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Ingresar Producto Notable</title>
  <link rel="stylesheet" href="../../assets/css/site.css">
  <script type="text/javascript" src="../../assets/js/jquery.js"></script>
  <script type="text/javascript">
    var i = 0;
    function addLikelyAnswer() {
      $('#save').remove();
      $('#numberAnswers').remove();
      var newEquation = $('#newEquation');
      var likelyAnswer = $('<div><label for="answer' + i + '" class="likelyA">Posible Error ' + (i + 1) + ': </label>' +
        '\n<input type="text" id="answer' + i + '" name="answer' + i + '" required></div>').fadeIn("slow");
      newEquation.append(likelyAnswer);
      var message = $('<div><label for="message' + i + '" class="likelyM">Mensaje al Error ' + (i + 1) + ': </label>' +
        '\n<input type="text" id="message' + i + '" name="message' + i + '" required></div>').fadeIn("slow");
      newEquation.append(message);  
      i++;
      var save = $('<button id="save">Guardar</button>').fadeIn('slow');
      newEquation.append(save);
      var numberAnswers = $('<input type="hidden" id="numberAnswers" name="numberAnswers" value="' + (i - 1) +'">');
      newEquation.append(numberAnswers);
    }
  </script>
</head>
<body>
<form id="newEquation" action="">
  <p>Ingrese la ecuación que desee evaluar junto con la respuesta correcta.</p>
  <p><small>Se pueden agregar posibles errores junto con mensajes hacía el usuario al cometerlos</small></p>
  <div>
    <label for="equation">
      Producto notable:
    </label>
    <input type="text" id="equation" name="equation" required>
  </div>
  <div>
    <label for="answer">
      Respuesta correcta:
    </label>
    <input type="text" id="answer" name="answer" required>
  </div>
  <button id="save">Guardar</button>
</form>
<button id="add" onclick="addLikelyAnswer();">Agregar posible respuesta</button>
</body>
</html>
