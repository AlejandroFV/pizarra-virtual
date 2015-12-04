<?php
session_start();
if ($_SESSION["valida"] == false && $_SESSION["role"] != 'tutor') {
    header('Location: login.php');
}
//error_reporting(E_ALL);
error_reporting(0);
ini_set('display_errors', 1);
require_once('../controller/equationController.php');
$equationController = new EquationController();
$equations = $equationController->getAllEquations();
?>

<!doctype html>

<html lang="en" class=" overthrow-enabled">
	<head>

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<meta charset="UTF-8">
		<title>Ingresar Producto Notable</title>
		<!-- <link rel="stylesheet" href="../../assets/css/site.css">  -->
		<script type="text/javascript" src="../../assets/js/jquery.js"></script>
		

		<!-- Bootstrap Core -->
		<link href="../../assets/css/bootstrap.min.css" rel="stylesheet">

		<!-- Font Awesome -->
		<link href="../../assets/fonts/css/font-awesome.min.css" rel="stylesheet">

		<!-- Admin Core -->
		<link href="../../assets/css/nifty.min.css" rel="stylesheet">

		<!-- Roboto Font -->
		<link href="http://fonts.googleapis.com/css?family=Roboto:400,700,300,500" rel="stylesheet" type="text/css">

		<!-- Link to theme -->
		<link href="../../assets/css/themes/themes-navbar/theme-ocean.min.css" rel="stylesheet">

		<!-- Application css -->
		<link href="../../assets/css/app.css" rel="stylesheet">

		<script src="../../assets/js/pace.min.js" type="text/javascript"></script>

		<style type="text/css">
			.jqstooltip {
				position: absolute;
				left: 0px;
				top: 0px;
				visibility: hidden;
				background-color: #212633;
				border-radius: 2px;
				color: white;
				text-align: right;
				white-space: nowrap;
				padding: 7px 14px;
				z-index: 10000;
			}

			.jqsfield {
				color: white;
				font-size: 14px;
				text-align: right;
			}
		</style>
	
</head>
		<body class=" nifty-ready pace-done">
			<!-- Page Loader -->
			<div class="pace pace-inactive">
				<div class="pace-progress" data-progress-text="100%" data-progress="99" style="width: 100%;">
					<div class="pace-progress-inner"></div>
				</div>
				<div class="pace-activity"></div>
			</div>
			<div id="container" class="effect mainnav-lg navbar-fixed">
				<!-- Navbar -->
				<!--===================================================-->
				<header id="navbar">
					<div id="navbar-container" class="boxed">

						<!-- BRAND LOGO & TEXT -->
						<!--===================================================-->
						<div class="navbar-header">
							<a href="paginaPrincipal.php" class="navbar-brand"> <img src="../../assets/images/logo.png" name="Nifty Admin" id="Nifty Admin" class="brand-icon"> <span class="brand-title"> <span class="brand-text">Pizarra Virtual</span> </span> </a>
						</div>
						<!--===================================================-->
						<!-- END OF BRAND LOGO & TEXT -->

						<!-- NAVBAR DROPDOWN -->
						<!--===================================================-->
						<div class="navbar-content clearfix">
							<ul class="nav navbar-top-links pull-left"></ul>

							<ul class="nav navbar-top-links pull-right">

								<!-- USER DROPDOWN -->
								<!--===================================================-->
								<li id="dropdown-user" class="dropdown">

									<!-- Dropdown button -->
									<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
									<a href="#" data-toggle="dropdown" class="dropdown-toggle text-right"> <span class="pull-right"> <img src="../../assets/images/av1.png" name="Profile Picture" id="Profile Picture"
										class="img-circle img-user media-object"> </span>
									<div class="username hidden-xs">
										<!--Obtener el nombre de usuario aqui-->
										<?php
										echo $_SESSION["name"] . " " . $_SESSION["last_name"];
										?>
									</div> </a>
									<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

									<!-- Dropdown menu -->
									<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
									<div class="dropdown-menu dropdown-menu-md dropdown-menu-right with-arrow panel-default">

										<ul class="head-list">

											<!-- Dropdown list -->
											<li>
												<a href="login/login.php"> <i class="fa fa-user fa-fw fa-lg"></i> <span class="text-nowrap">Perfil</span> </a>
											</li>

											<!-- Dropdown list -->
											<li>
												<a href="../../application/view/login.php"> <i class="fa fa-sign-out fa-fw fa-lg"></i> <span>Salir</span> </a>
											</li>
										</ul>
									</div>
									<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

								</li>
								<!-- END OF USER DROPDOWN -->
								<!--===================================================-->

							</ul>
						</div>
						<!--===================================================-->
						<!-- END OF NAVBAR DROPDOWN -->

					</div>
				</header>
				<!--===================================================-->
				<!-- END OF NAVBAR -->

				<!-- CONTENT -->
				<!--===================================================-->
				<div class="boxed">
					<!-- CONTENT CONTAINER -->
					<!--===================================================-->
					<div id="content-container">

                                            <form id="assignForm" method="post" action="../controller/assignController.php">
  <table  class="table table-bordered table-hover">
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
					</div>
					<!--===================================================-->
					<!-- END OF CONTENT CONTAINER -->

					<!--SIDEBAR-->
					<!--===================================================-->

					<nav id="mainnav-container" data-sm="mainnav-sm" data-all="mainnav-lg">
						<div id="mainnav">

							<!-- MAIN NAVIGATION : MENU -->
							<!--===================================================-->
							<div id="mainnav-menu-wrap">
								<div class="nano has-scrollbar">
									<div class="nano-content" tabindex="0" style="right: -15px;">
										<ul id="mainnav-menu" class="list-group">
<?php
                                if ($_SESSION["role"] == 'tutor') {
                                    echo '
                                <li class="dropdown">
  <a class="menu-title dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"  href="#"><!-- aria-expanded="true" -->
    Alumnos
    <span class="caret"></span>
  </a>
  <ul class="dropdown-menu" style="border-width: 0px"> <!-- aria-labelledby="dropdownMenu1" -->
    <li><a href="registrarAlumno.php"><strong>Registrar</strong></a></span> <span class="menu-title"></a></li>
    <li><a href="eliminarUsuario.php"><strong>Eliminar</strong></a></span> <span class="menu-title"></a></li>
    <li><a href="users.php"><strong>Ubicaci�n</strong></a></span> <span class="menu-title"></a></li>
    <li><a href="#"></a></li>

  </ul>
</li>

<li class="dropdown">
  <a class="menu-title dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"  href="#"><!-- aria-expanded="true" -->
    Tutor
    <span class="caret"></span>
  </a>
  <ul class="dropdown-menu" style="border-width: 0px"> <!-- aria-labelledby="dropdownMenu1" -->
    <li><a href="registrarTutor.php"><strong>Registrar</strong></a></span> <span class="menu-title"></a></li>
    <li><a href="cambiarDatosTutor.php"><strong>Modificar</strong></a></span> <span class="menu-title"></a></li>
    <li><a href="eliminarUsuario.php"><strong>Eliminar</strong></a></span> <span class="menu-title"></a></li>
    <li><a href="#"></a></li>

  </ul>
</li>

<li class="dropdown">
  <a class="menu-title dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"  href="#"><!-- aria-expanded="true" -->
    Archivos
    <span class="caret"></span>
  </a>
  <ul class="dropdown-menu" style="border-width: 0px"> <!-- aria-labelledby="dropdownMenu1" -->
    <li><a href="addFileView.php">Agregar nuevo</a></li>
    <li><a href="indexFileView.php">Ver archivos</a></li>
    <li><a href="#"></a></li>
  </ul>
</li> 
<li class="dropdown">
  <a class="menu-title dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"  href="#"><!-- aria-expanded="true" -->
    Ecuaciones
    <span class="caret"></span>
  </a>
  <ul class="dropdown-menu" style="border-width: 0px"> <!-- aria-labelledby="dropdownMenu1" -->
    <li><a href="newEquation.php">Agregar ecuacion</a></li>
    <li><a href="assignEquations.php">Asignar ecuacion</a></li>
    <li><a href="#"></a></li>
    <li><a href="#"></a></li>
  </ul>
</li>';
                                } else {
                                    if ($_SESSION["role"] == 'alumno') {
                                        echo '
                                <li class="dropdown">
  <a class="menu-title dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"  href="#"><!-- aria-expanded="true" -->
    Documentos
    <span class="caret"></span>
  </a>
  <ul class="dropdown-menu" style="border-width: 0px"> <!-- aria-labelledby="dropdownMenu1" -->
    <li><a href="indexFileView.php"><strong>Ver documentos</strong></a></span> <span class="menu-title"></a></li>
    <li><a href="#"></a></li>

  </ul>
</li>

<li class="dropdown">
  <a class="menu-title dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"  href="#"><!-- aria-expanded="true" -->
    Metricas
    <span class="caret"></span>
  </a>
  <ul class="dropdown-menu" style="border-width: 0px"> <!-- aria-labelledby="dropdownMenu1" -->
    <li><a href="Metricas.php"><strong>Registrar metricas</strong></a></li>
  </ul>
</li>
</li>
<li class="dropdown">
  <a class="menu-title dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"  href="#"><!-- aria-expanded="true" -->
    Cuenta
    <span class="caret"></span>
  </a>
  <ul class="dropdown-menu" style="border-width: 0px"> <!-- aria-labelledby="dropdownMenu1" -->
    <li><a href="cambiarDatosAlumno.php">Modificar datos</a></li>
    <li><a href="#"></a></li>
  </ul>
</li>
';
                                    } else {
                                        if ($_SESSION["role"] == 'admin') {
                                            echo '<li class="dropdown">
  <a class="menu-title dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"  href="#"><!-- aria-expanded="true" -->
    Tutores
    <span class="caret"></span>
  </a>
  <ul class="dropdown-menu" style="border-width: 0px"> <!-- aria-labelledby="dropdownMenu1" -->
    <li><a href="#">Alta de tutores</a></li>
    <li><a href="#">Baja de tutores</a></li>
    <li><a href="#"></a></li>
    <li><a href="#"></a></li>
  </ul>
</li>';
                                        }
                                    }
                                    
                                }
                                
                                
                                ?>
											
										</ul>
									</div>
								</div>
							</div>
							<!--===================================================-->
							<!-- END OF MAIN NAVIGATION : MENU -->
						</div>
					</nav>
					<!--===================================================-->
					<!-- END OF MAIN NAVIGATION -->
					<!--===================================================-->

				</div>
				<!--===================================================-->
				<!--END OF CONTENT -->

				<!-- FOOTER -->
				<!--===================================================-->
				<footer id="footer">
					<!-- Visible when the footer is static position -->
					<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
					<!-- <div class="hide-fixed pull-right pad-rgt">
					Made with <i class="fa fa-heart"></i> by <a class="text-primar    y" href="https://github.com/anuarml">Anuar
					Morales</a>
					</div>

					<p class="pad-lft">© 2015 Pizarra Virtual- UADY</p> -->

				</footer>
				<!--===================================================-->
				<!-- END OF FOOTER -->

				<!-- SCROLL TOP BUTTON -->
				<!--===================================================-->
				<button id="scroll-top" class="btn">
					<i class="fa fa-chevron-up"></i>
				</button>
				<!--===================================================-->
			</div>
			<!--===================================================-->
			<!-- END OF CONTAINER -->

			<!-- jQuery Version 2.1.4 -->
			<script src="../../assets/js/jquery.min.js" type="text/javascript"></script>

			<!-- Bootstrap Core JavaScript -->
			<script src="../../assets/js/bootstrap.min.js" type="text/javascript"></script>

			<!-- Admin Core -->
			<!-- <script src="../../assets/js/nifty.min.js" type="text/javascript"></script> -->

		</body>
</html>


