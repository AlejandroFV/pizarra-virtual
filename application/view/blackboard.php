<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('../controller/equationController.php');
$equationController = new EquationController();
$equations = $equationController->getEquations();
$equations_size = sizeof($equations);
?>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Pizzarra Virtual</title>
  <link rel="stylesheet" href="../../assets/css/site.css">
  <link rel="stylesheet" href="../../assets/css/font-awesome.min.css">
  <link href='https://fonts.googleapis.com/css?family=Homemade+Apple' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Bad+Script' rel='stylesheet' type='text/css'>
  <script type="text/javascript" src="../../assets/js/jquery.js"></script>
  <script type="text/javascript">
    attempt = 1;
    result = 0;

    $(document).ready(function () {
      $("#attempts").val(attempt);
    });

    function sendRequest() {
      $.post("../controller/validator.php", $('#equations-form').serialize()).done(function (data) {
        data = data.split("@");
        attempt = data[0];
        data.shift();
        result = data[0];
        data.shift();
        $("#attempts").val(attempt);
        if ((parseInt(attempt) > 3) || (result == <?php echo $equations_size; ?>)) {
          $("#send").remove();
          $("#equations-form").append('<p id="result">Calificación: ' + result + '/' + <?php echo $equations_size?> + '</p>');
        }
        displayResult(data);
      });
    }
    function displayResult(sMensaje) {
      for(j = 0; j < <?php echo $equations_size?>; j++){
        var divMessage = document.getElementById("answer"+j);
        divMessage.innerHTML = sMensaje[j];
      }
    }
  </script>
</head>
<body>
<div id="blackboard">
  <h2>Pizarra virtual</h2>

  <div id="exercises">
    <form id="equations-form" action="../controllers/validator.php" method="post" onsubmit="sendRequest(); return false;">
      <div id="equations">
        <ol>
          <?php
          if ($equations !== null) {
            $i = 0;
            foreach ($equations as $equation) {?>
              <li>
                <label><?php echo $equation->getEquation(); ?> = </label>
                <input type="text" class="answers" name="answer<?php echo $i; ?>">

                <p id="answer<?php echo $i; ?>" class="checked"></p>
              </li>
              <?php
              $i++;
            }
          }
          ?>
        </ol>
      </div>
      <input type="hidden" name="attempts" id="attempts">
      <button id="send"><i class="fa fa-chevron-circle-up"></i> Enviar</button>
    </form>
  </div>
</div>
</body>
</html>