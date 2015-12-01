<?php
require_once('../controller/equationController.php');
require_once('../controller/likelyAnswerController.php');

session_start();
if ($_SESSION["valida"] == false && $_SESSION["role"] != 'tutor') {
    header('Location: login.php');
}

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
	
	$likelyAnswer = trim($likelyAnswer);
   $likelyAnswer = str_replace(' ', '', $likelyAnswer);
    
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
    //header('location: ../view/assignEquations.php');
  } else {
    //print_r('Success');
    echo '<script type="text/javascript">	alert("Exito");</script>';
	header('location: ../view/newEquation.php');
  }
}
?>
<!doctype html>

<html lang="en" class=" overthrow-enabled">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<meta charset="UTF-8">
		<title>Ingresar Producto Notable</title>
		<!-- <link rel="stylesheet" href="../../assets/css/site.css">  -->
		<script type="text/javascript" src="../../assets/js/jquery.js"></script>
		<script type="text/javascript">
    var i = 0;
    function addLikelyAnswer() {
      $('#save').remove();
      $('#numberAnswers').remove();
      var newEquation = $('#newEquation');
      var likelyAnswer = $('<div class="form-group "><label for="answer' + i + '" class="likelyA">Posible Error ' + (i + 1) + ': </label>' +
        '\n<input type="text" id="answer' + i + '" name="answer' + i + '" class="form-control" required></div>').fadeIn("slow");
      newEquation.append(likelyAnswer);
      var message = $('<div class="form-group "><label for="message' + i + '" class="likelyM">Mensaje al Error ' + (i + 1) + ': </label>' +
        '\n<input type="text" id="message' + i + '" name="message' + i + '" class="form-control" required></div>').fadeIn("slow");
      newEquation.append(message);  
      i++;
      var save = $('<button id="save">Guardar</button>').fadeIn('slow');
      newEquation.append(save);
      var numberAnswers = $('<input type="hidden" id="numberAnswers" name="numberAnswers" value="' + (i - 1) +'">');
      newEquation.append(numberAnswers);
    }
  </script>

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

						<h3>Ingrese la ecuación que desee evaluar junto con la respuesta correcta.</h3>

						<h4><small>Se pueden agregar posibles errores junto con mensajes hacía el usuario al cometerlos</small></h4>

						<div class="col-xs-4">
							<form id="newEquation" action="" >

								<div class="form-group ">
									<label for="equation"> Producto notable: </label>
									<input type="text" id="equation" name="equation" class="form-control" required>
								</div>
								<div class="form-group ">
									<label for="answer"> Respuesta correcta: </label>
									<input type="text" id="answer" name="answer" class="form-control" required>
								</div>
								<button id="save" class="btn btn-default">
									Guardar
								</button>

							</form>
							<button id="add" onclick="addLikelyAnswer();" class="btn btn-default">
								Agregar posible respuesta
							</button>
						</div>

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

											<li class="dropdown">
												<a class="menu-title dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"  href="#"><!-- aria-expanded="true" --> Cuenta <span class="caret"></span> </a>
												<ul class="dropdown-menu" style="border-width: 0px">
													<!-- aria-labelledby="dropdownMenu1" -->
													<li>
														<a href="#">Modificar datos</a>
													</li>

												</ul>
											</li>

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

