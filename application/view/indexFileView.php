<?php
session_start();
if ($_SESSION["valida"] == true   ) {
    $role=$_SESSION["role"];
    include_once('../controller/indexFileController.php');
}else{
    header('Location: login.php');

}

?>
<html lang="en" class=" overthrow-enabled">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Visualizar Archivos</title>
    
    <link rel="stylesheet" href="../../assets/css/style.css" type="text/css" />
<script type="text/javascript" src="../../assets/js/verArchivos.js"></script>
<script type="text/javascript" src="../../assets/js/zxml.js"></script>
    
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
    function sendRequest() {
      $.post("../controller/validator.php", $('#equations-form').serialize()).done(function (data) {
        data = data.split("@");
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

            

 <div id="header">
    <h1>Archivos Disponibles</h1>
</div>

<div id="body">

	<table id="tabla">
    <tr style="background-color:black; color:white;">
    <td>ID</td>
    <td>Nombre del Archivo</td>
    <td>Tipo</td>
    <td>Tamaño</td>
    <td>Grupo</td>
    <td>Ver</td>
    <td>Descargar</td>
        <?php

        if($role != 'alumno'){
            echo "<td></td><td></td>";
        }

        ?>

    </tr>
    <div id="files">
        <?php
        
        
        $files=getFiles();
        while($row = mysqli_fetch_array($files)){
            ?>
            <form action="../controller/modifyFileController.php" method ="post">
                <tr>
                    <td><input type="text" name="id" value="<?php echo $row['id'] ?>" readonly/>
                    </td>
                    <td><?php echo $row['file'] ?></td>
                    <td><?php echo $row['type'] ?></td>
                    <td><?php echo $row['size'] ?> kb</td>
                    <td>
                        <input type="text" name="id" value="<?php echo $row['workgroup'] ?>" readonly />

                    </td>
                    <td><a onclick="visualizar(<?php echo $row['id']?>);return false;" href="" target="">Visualizar</a></td>
                    <td><a href="../../assets/uploads/<?php echo $row['file'] . '.' . $row['type']?>" target="no">Descargar</a></td>
                    <?php
                    if($role != 'alumno'){
                        echo "<td><input type=\"submit\" name=\"delete\" value=\"Delete\" /></td>";

                        echo  "<td><input type=\"submit\" name=\"edit\" value=\"Edit\" /></td>";
                    }?>

                </tr>
            </form>
        <?php
        }
        ?>
    </div>
    </table>


<!-- ESTO QUITE MEDIAFILE       <a href="addFileView.php">Subir más archivos</a><br><br>-->

    <div align="center" id="mediaDiv">

    </div>
    
   

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
                                    echo '<li class="dropdown">
  <a class="menu-title dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"  href="#"><!-- aria-expanded="true" -->
    Cuenta
    <span class="caret"></span>
  </a>
  <ul class="dropdown-menu" style="border-width: 0px"> <!-- aria-labelledby="dropdownMenu1" -->
    <li><a href="#">Modificar datos</a></li>
    
  </ul>
</li>';
                                } else {
                                    if ($_SESSION["role"] == 'alumno') {
                                        echo '<li class="dropdown">
  <a class="menu-title dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"  href="#"><!-- aria-expanded="true" -->
    Cuenta
    <span class="caret"></span>
  </a>
  <ul class="dropdown-menu" style="border-width: 0px"> <!-- aria-labelledby="dropdownMenu1" -->
    <li><a href="#">Modificar datos</a></li>
    <li><a href="#">Eliminar cuenta</a></li>
    <li><a href="#"></a></li>
  </ul>
</li>
                                <li class="dropdown">
  <a class="menu-title dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"  href="#"><!-- aria-expanded="true" -->
    Documentos
    <span class="caret"></span>
  </a>
  <ul class="dropdown-menu" style="border-width: 0px"> <!-- aria-labelledby="dropdownMenu1" -->
    <li><a href="indexFileView.php"><strong>Ver documentos</strong></a></span> <span class="menu-title"></a></li>
    <li><a href="#"></a></li>
    <li><a href="#"></a></li>
    <li><a href="#"></a></li>
  </ul>
</li>

<li class="dropdown">
  <a class="menu-title dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"  href="#"><!-- aria-expanded="true" -->
    Metricas
    <span class="caret"></span>
  </a>
  <ul class="dropdown-menu" style="border-width: 0px"> <!-- aria-labelledby="dropdownMenu1" -->
    <li><a href="#"></a></li>
    <li><a href="#"></a></li>
    <li><a href="#"></a></li>
    <li><a href="#"></a></li>
  </ul>
</li>';
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
<script src="../../assets/js/jquery.min.js" type="text/javascript"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../../assets/js/bootstrap.min.js" type="text/javascript"></script>

<!-- Admin Core -->
<script src="../../assets/js/nifty.min.js" type="text/javascript"></script>

</body>
</html>