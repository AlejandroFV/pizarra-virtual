<?php
session_start();
if ($_SESSION["valida"] == false && $_SESSION["role"] != 'administrador') {
	header('Location: login.php');
}
?>
<html lang="en" class=" overthrow-enabled">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
		<title>Registrar Tutor</title>

		<script type="text/javascript" src="../../assets/js/zxml.js"></script>
		<script type="text/javascript" src="../../assets/js/jquery.js"></script>
		<script type="text/javascript">
			var realizar = 1;

			function sendRequest() {
				var oForm = document.forms[0];
				var sBody = getRequestBody(oForm);
				var oXmlHttp = zXmlHttp.createRequest();
				oXmlHttp.open("post", oForm.action, true);
				oXmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

				oXmlHttp.onreadystatechange = function() {
					if (oXmlHttp.readyState == 4) {
						if (oXmlHttp.status == 200) {
							saveResult(oXmlHttp.responseText);

						} else {
							saveResult("Ocurrio un error: " + oXmlHttp.statusText)
						}
					}
				};
				oXmlHttp.send(sBody);
			}

			function getRequestBody(oForm) {
				//funcion que devuelve una cadena de consulta
				var aParams = new Array();
				for (var i = 0; i < oForm.elements.length; i++) {
					var sParam = encodeURIComponent(oForm.elements[i].name);
					sParam += "=";
					sParam += encodeURIComponent(oForm.elements[i].value);
					aParams.push(sParam);
				}
				aParams.push(sParam);
				return aParams.join("&");
			}

			function saveResult(sMensaje) {

				var divStatus = document.getElementById("divStatus");
				divStatus.innerHTML = sMensaje;
				$('#myModal').modal('show'); 

			}

			function salir() {
				window.location = "login.php";
			}

		</script>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Pizarra Virtual</title>

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
												<a href="login.php"> <i class="fa fa-sign-out fa-fw fa-lg"></i> <span>Salir</span> </a>
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
						<form action="../controller/altaTutor.php" method="post" onsubmit="sendRequest();
						return false" class="col-xs-4">

							<h1>Registro</h1>

							<div class="form-group " >
								<label>Matricula:</label>
								<input name="mat" class="form-control" type="number" required/>
							</div>

							<div class="form-group " >
								<label>Nombre:</label>
								<input name="nom" class="form-control" type="text" required/>
							</div>

							<div class="form-group " >
								<label>Apellido:</label>
								<input name="ap" class="form-control" type="text" required/>
							</div>

							<div class="form-group " >
								<label>Mail:</label>
								<input name="mail" class="form-control" type="email" required/>
							</div>

							<div class="form-group " >
								<label>Genero:</label>
								<SELECT name="sex" class="esp" required>
									<OPTION value="hombre">hombre</OPTION>
									<OPTION value="mujer">mujer</OPTION>
								</SELECT>
							</div>

							<div class="form-group " >
								<label>Contrasena:</label>
								<input name="pass" class="form-control" type="password" required/>
							</div>

							<input type="submit" value="Registrar" name="btnEnviar" class="btn btn-default"/>
							<input type="button" value="Salir" name="btnSalir"  class="btn btn-default" onclick="salir()"/>

						</form>
						<div></div>
						<!--========================AQUI VA TODOOO===========================-->

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
    <li><a href="users.php"><strong>Ubicaciï¿½n</strong></a></span> <span class="menu-title"></a></li>

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
</li>
<li class="dropdown">
  <a class="menu-title dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"  href="#"><!-- aria-expanded="true" -->
    Gráficas
    <span class="caret"></span>
  </a>
  <ul class="dropdown-menu" style="border-width: 0px"> <!-- aria-labelledby="dropdownMenu1" -->
    <li><a href="../graph/php/views/grafica.php">Ver gráficas</a></li>
    <li><a href="#"></a></li>
  </ul>
</li>

';
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

					<p class="pad-lft">Â© 2015 Pizarra Virtual- UADY</p> -->

				</footer>
				<!--===================================================-->
				<!-- END OF FOOTER -->

				<!-- SCROLL TOP BUTTON -->
				<!--===================================================-->
				<button id="scroll-top" class="btn">
					<i class="fa fa-chevron-up"></i>
				</button>
				
				
				<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        
        <div id="divStatus" class="modal-body">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
			</div>
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