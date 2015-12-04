 <?php
session_start();
if ($_SESSION["valida"] == false && $_SESSION["role"] != 'alumno') {
    header('Location: login.php');
	error_reporting(0);
}
error_reporting(0);
//error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('../controller/equationController.php');
$equationController = new EquationController();
$equations = $equationController->getEquations();
$equations_size = sizeof($equations);

?>
<html lang="en" class=" overthrow-enabled">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pizarra Virtual</title>
 <link rel="stylesheet" href="../../assets/css/site.css">
 <link rel="stylesheet" href="../../assets/css/chat.css" type="text/css" />
  <link rel="stylesheet" href="../../assets/css/font-awesome.min.css">
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
    
    <meta charset="UTF-8">
    <title>ALUMNO</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/tarea1.css">
    <script type="text/javascript" src="../../assets/js/jquery-1.11.3.js"></script>
    <script type="text/javascript" src="../../assets/js/zxml.js"></script>
    <script src="../../assets/js/jquery.js"></script>
    <script src="../../assets/js/jquery-ui.js"></script>
    
   
  <link href='https://fonts.googleapis.com/css?family=Homemade+Apple' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Bad+Script' rel='stylesheet' type='text/css'>
  <script type="text/javascript" src="../../assets/js/jquery.js"></script>
<script type="text/javascript">

(function(){
      

    var content = document.getElementById("geolocation-test");

    if (navigator.geolocation)
    {
        navigator.geolocation.getCurrentPosition(function(objPosition)
        {
            var lon = objPosition.coords.longitude;
            var lat = objPosition.coords.latitude;
            var id_user = <?php echo json_encode($_SESSION["id"]); ?>;
                var datos = {
                            id_alumn:id_user,
                            longitud : lon,
                            latitud : lat,
                           };
                            $.ajax({
                        url: "../controller/location.php",
                        type: "post",
                        data: datos ,
                        success: function (response) {
                           // you will get response from your php page (what you echo or print)                 

                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                           console.log(textStatus, errorThrown);
                        }


    });
                

        }, function(objPositionError)
        {
            switch (objPositionError.code)
            {
                case objPositionError.PERMISSION_DENIED:
                    content.innerHTML = "No se ha permitido el acceso a la posición del usuario.";
                break;
                case objPositionError.POSITION_UNAVAILABLE:
                    content.innerHTML = "No se ha podido acceder a la información de su posición.";
                break;
                case objPositionError.TIMEOUT:
                    content.innerHTML = "El servicio ha tardado demasiado tiempo en responder.";
                break;
                default:
                    content.innerHTML = "Error desconocido.";
            }
        }, {
            maximumAge: 75000,
            timeout: 15000
        });
    }
    else
    {
        content.innerHTML = "Su navegador no soporta la API de geolocalización.";
    }
})();



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
    
    <script type="text/javascript">
    
    
    
        function cerrarSesion() {

            document.location.href = "login.php";
        }

        function eliminarCuenta() {
            document.location.href = "../controller/bajaAlumno.php";
        }

        function irAcambiarDatos() {
            document.location.href = "cambiarDatosAlumno.php";
        }


    </script>
    
    <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="../../assets/js/chat.js"></script>
    <script type="text/javascript">
    
        /*var name = prompt("Usuario:", "Invitado");
        
        // Nickname por default: Guest
    	if (!name || name === ' ') {
    	   name = "Invitado";	
    	}*/
    	
        var name = <?php echo json_encode($_SESSION["name"]); ?>;
        
    	// Eliminacion de basura
    	// name = name.replace(/(<([^>]+)>)/ig,"");
//         
        // var group = prompt("Grupo:", 1);
//         
        // // Nickname por default: Guest
    	// if (!group || group === ' ') {
    	   // group = 1;	
    	// }
//     	
    	// // Eliminacion de basura
    	// group = group.replace(/(<([^>]+)>)/ig,"");
    	
    	// Inicio de chat
        var chat =  new Chat(<?php echo json_encode($_SESSION["id"]); ?>);
    	$(function() {
    	
    		 chat.getState(); 
             chat.history();
    		 
    		 // A la espera de teclas presionadas en textarea
             $("#sendie").keydown(function(event) {  
             
                 var key = event.which;  
           
                 // Todas las teclas
                 if (key >= 33) {
                   
                     var maxLength = $(this).attr("maxlength");  
                     var length = this.value.length;  
                     
                     // No permitir seguir escribiendo si se llegó al limite
                     if (length >= maxLength) {  
                         event.preventDefault();  
                     }  
                  }
             });
    		 
            // A la espera de la tecla ENTER
    		 $('#sendie').keyup(function(e) {	
    		 					 
    			  if (e.keyCode == 13) { 
    			  
                    var text = $(this).val();
    				var maxLength = $(this).attr("maxlength");  
                    var length = text.length; 
                     
                    // Envio
                    if (length <= maxLength + 1) { 
                     
    			        chat.send(text, name);	
    			        $(this).val("");
    			        
                    } else {
                    
    					$(this).val(text.substring(0, maxLength));
    					
    				}	
    				
    				
    			  }
             });
            
    	});
    </script>
    
  

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

<body class=" nifty-ready pace-done" onload="setInterval('chat.update()', 1000)">
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
                <a href="paginaPrincipal.php" class="navbar-brand">
                    <img src="../../assets/images/logo.png" name="Nifty Admin" id="Nifty Admin" class="brand-icon">
                    <span class="brand-title">
                      <span class="brand-text">Pizarra Virtual</span>
                    </span>
                </a>
            </div>
            <!--===================================================-->
            <!-- END OF BRAND LOGO & TEXT -->

            <!-- NAVBAR DROPDOWN -->
            <!--===================================================-->
            <div class="navbar-content clearfix">
                <ul class="nav navbar-top-links pull-left">
                </ul>

                <ul class="nav navbar-top-links pull-right">

                    <!-- USER DROPDOWN -->
                    <!--===================================================-->
                    <li id="dropdown-user" class="dropdown">

                        <!-- Dropdown button -->
                        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                        <span class="pull-right">
                            <img src="../../assets/images/av1.png" name="Profile Picture" id="Profile Picture"
                                 class="img-circle img-user media-object">
                        </span>

                            <div class="username hidden-xs"><!--Obtener el nombre de usuario aqui-->
                            	<?php
                            	echo $_SESSION["name"]." ".$_SESSION["last_name"];
                            	?>
                            </div>
                        </a>
                        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

                        <!-- Dropdown menu -->
                        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right with-arrow panel-default">

                            <ul class="head-list">

                                <!-- Dropdown list -->
                                <li>
                                    <a href="login/login.php">
                                        <i class="fa fa-user fa-fw fa-lg"></i>
                                        <span class="text-nowrap">Perfil</span>
                                    </a>
                                </li>

                                <!-- Dropdown list -->
                                <li>
                                    <a href="login.php">
                                        <i class="fa fa-sign-out fa-fw fa-lg"></i>
                                        <span>Salir</span>
                                    </a>
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

             <h1>Pizarra Virtual </h1>

    <!-- <form id="menu">
        </br></br></br>
        
        <input type="button" onclick="eliminarCuenta();" value="EliminarCuenta"/>
    </form> -->
    <div id="blackboard">
  <h2>Pizarra virtual</h2>

  <div id="exercises">
    <form id="equations-form" action="../controller/validator.php" method="post" onsubmit="sendRequest(); return false;">
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

<div id="page-wrap" >
        
        <div id="chat-wrap"><div id="chat-area"></div></div>
        
        <form id="send-message-area">
            <p>Mensaje: </p>
            <textarea id="sendie" maxlength = '100' ></textarea>
        </form>
    
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
    <li><a href="users.php"><Ubicaci�n</strong></a></span> <span class="menu-title"></a></li>
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
    <button id="scroll-top" class="btn"><i class="fa fa-chevron-up"></i></button>
    <!--===================================================-->
</div>
<!--===================================================-->
<!-- END OF CONTAINER -->

<!-- jQuery Version 2.1.4 -->
<!-- <script src="../../assets/js/jquery.min.js" type="text/javascript"></script> -->

<!-- Bootstrap Core JavaScript -->
<script src="../../assets/js/bootstrap.min.js" type="text/javascript"></script>

<!-- Admin Core -->
<!-- <script src="../../assets/js/nifty.min.js" type="text/javascript"></script> -->

</body>
</html>