<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('../controllers/equationController.php');
$equationController = new EquationController();
$equations = $equationController->getAllEquations();
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Asignar productos notables</title>
  <script type="text/javascript" src="../../assets/js/jquery.js"></script>
</head>
<body>
<form id="assignForm" method="post" action="../controllers/assignController.php">
  <table>
    <tr>
      <th>
        Equation
      </th>
      <?php foreach ($equations['groups'] as $group) { ?>
        <th>
          <?php echo $group ?>
        </th>
      <?php } ?>
    </tr>
    <?php for ($i = 0; $i < sizeof($equations['ungrouped']); $i++) { ?>
      <tr>
        <td>
          <?php echo $equations['ungrouped'][$i]->getEquation(); ?>
        </td>
        <?php foreach ($equations['groups'] as $group) { ?>
          <td>
            <input type="checkbox" id="ue<?php echo $i . "g" . $group; ?>" name="ue<?php echo $i . "g" . $group; ?>">
          </td>
        <?php } ?>
      </tr>
    <?php } ?>
    <?php for ($i = 0; $i < sizeof($equations['grouped']); $i++) { ?>
      <tr>
        <td>
          <?php echo $equations['grouped'][$i][0]->getEquation(); ?>
        </td>
        <?php foreach ($equations['groups'] as $group) { ?>
          <td>
            <input type="checkbox" id="e<?php echo $i . "g" . $group; ?>" name="e<?php echo $i . "g" . $group; ?>">
          </td>
        <?php } ?>
      </tr>
    <?php } ?>
  </table>
  <button>Asignar</button>
</form>

<script>
  $(document).ready(function () {
    <?php for ($i = 0; $i < sizeof($equations['grouped']); $i++) { ?>
    <?php foreach ($equations['groups'] as $group) { ?>
    var _check = <?php if (in_array($group, $equations['grouped'][$i][1])) {
        echo "true";
        } else {
        echo "false";
        } ?>;
    var id = "#e<?php echo $i . "g" . $group; ?>";
    $(id).prop('checked', _check);
    <?php } ?>
    <?php } ?>
  });
</script>
</body>
</html>
