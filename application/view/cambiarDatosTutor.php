<?php
session_start();
 if ($_SESSION["valida"] == false && $_SESSION["role"] != 'tutor') {
   header('Location: login.php');
}
?>
<html lang="en" class=" overthrow-enabled">
<head>
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
    
    
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
    <title>Modificar Tutor</title>
    
    <script type="text/javascript" src="../../assets/js/zxml.js"></script>
    <script type="text/javascript">
        var realizar = 1;

        function sendRequest() {
            var oForm = document.forms[0];
            var sBody = getRequestBody(oForm);
            var oXmlHttp = zXmlHttp.createRequest();
            oXmlHttp.open("post", oForm.action, true);
            oXmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            oXmlHttp.onreadystatechange = function () {
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
            //sParam = encodeURIComponent("realizar");
            //sParam += "=";
            //sParam += encodeURIComponent(realizar.toString());
            aParams.push(sParam);
            return aParams.join("&");
        }

        function saveResult(sMensaje) {

            var divStatus = document.getElementById("divStatus");
            divStatus.innerHTML = sMensaje;


        }

        function salir() {
            window.location = "login.php";
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
                <a href="index.html" class="navbar-brand">
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

                            <div class="username hidden-xs"><!--Obtener el nombre de usuario aqui--></div>
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

             <form action="../controller/modificarTutor.php" method="post" onsubmit="sendRequest();
                return false" class="col-xs-4">
    
            <h1>Modificar Datos</h1>
         <div class="form-group " >
            <label>Nombre:</label>
           <input name="nom" class="form-control" type="text" required/>
        </div>
         <div class="form-group " >
            <label>Apellido:</label></td>
            <input name="ap" class="form-control" type="text" required/>
            </div>
        
         <div class="form-group " >
            <label>Mail:</label>
            <input name="mail" class="form-control" type="email" required/>
            </div>
        
             <div class="form-group " >
                <label>Genero:</label>
           <select name="sex" class="esp" required>
                    <option value="hombre">hombre</option>
                    <option value="mujer">mujer</option>
                </select>
                </div>
                
                
        <div class="form-group " >
            <label>Contrasena:</label>
            <input name="pass" class="form-control" type="password" required/>
            </div>
        
        
        
           <input type="submit" value="Aceptar" name="btnEnviar" class="btn btn-default"/>
            <input type="button" value="Salir" name="btnSalir" onclick="salir()" class="btn btn-default"/>
            
        
</form>
<div id="divStatus"></div>

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

                                <!--Category name-->
                                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                                <li class="list-header">Navegación</li>

                                <!-- Menu list item -->
                                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                                <li>
                                    <a href="index.html">
                                        <i class="fa fa-dashboard"></i>
                                        <span class="menu-title"><strong>Estadísticas</strong></span>
                                    </a>
                                </li>

                                <li class="list-divider"></li>

                                <!-- Category name -->
                                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                                <li class="list-header">Otra Categoría</li>

                                <!-- Menu list item-->
                                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                                <li>
                                    <a href="#">
                                        <i class="fa fa-briefcase"></i>
                                        <span class="menu-title">UI Elements</span>
                                    </a>
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