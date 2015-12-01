<?php
session_start();
if ($_SESSION["valida"] == false && $_SESSION["role"] != 'alumno') {
    header('Location: login.php');
    error_reporting(0);
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

        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Gestion Alumnos</title>

        <script type="text/javascript" src="../../assets/js/zxml.js"></script>

        <style type="text/css">
            #map {
                height: 100%;
                width: 100%;
            }

            div.scroll {
                height: 100%;
                overflow: scroll;
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
                        <a href="paginaPrincipal.php" class="navbar-brand"> <img src="../../assets/images/logo.png" name="Nifty Admin" id="Nifty Admin" class="brand-icon"> <span class="brand-title"> <span class="brand-text">Pizarra Virtual</span> </span>
                        </a>
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
                                    </div>
                                </a>
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
                    <div class="col-md-8 scroll" id="students">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Matricula</th>
                                    <th>Nombre</th>
                                    <th>Licenciatura</th>
                                    <th>Grupo</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <div id="map"></div>
                    </div>

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

        <!-- Google Maps API -->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=true"></script>

        <script type="text/javascript">
            $(function(){
                $.ajax({
                    type: "POST",
                    url: "../controller/UserController.php",
                    dataType : "json",
                    success: function(data){
                        if(data.ids){
                            for (var i = 0; i < data.ids.length; i++) {
                                var name = "\"" + data.names[i] + "\"";
                                $('#tbody').append(
                                    "<tr onclick='crearMaps("+name+", " + data.latitudes[i] + ", " + data.longitudes[i] + ")'><td>" + data.ids[i] + "</td><td>" + data.names[i] + "</td><td>" + data.specialties[i] + "</td><td>" + data.groups[i] + "</td></tr>"
                                    //"<tr><td>hola</td><td>hola</td><td>hola</td><td>hola</td></tr>"
                                );
                            }								  
                        }
                    },
                });
            });

            function crearMaps(name, lat, lng) {
                var opciones = {
                    center: new google.maps.LatLng(lat, lng),
                    zoom: 18,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                }

                var map = new google.maps.Map(document.getElementById("map"), opciones);
                //Marcador de posición (rojo)
                var marker = new google.maps.Marker({
                    position: map.getCenter(),
                    map: map,
                });
                //Globo de información
                var infowindow = new google.maps.InfoWindow({
                    content: name,
                });
                google.maps.event.addListener(marker, 'click', function () {
                    infowindow.open(map, marker);
                });

                google.maps.event.addDomListener(window, 'load');
            }
        </script>

        <!-- Admin Core -->
        <!-- <script src="../../assets/js/nifty.min.js" type="text/javascript"></script> -->
    </body>

</html>