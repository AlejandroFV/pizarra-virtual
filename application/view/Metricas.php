<?php
  session_start();
  if ($_SESSION["valida"] == false&& $_SESSION["role"] != 'alumno') {
      header('Location: login.php');
    error_reporting(0);
  }
?>

<html lang="en" class=" overthrow-enabled"><head>
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

    <!-- CKeditor -->
    <script src="../../ckeditor/ckeditor.js"></script>

    <style type="text/css">
        .jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background-color: #212633;border-radius: 2px;color: white;text-align: right;white-space: nowrap;padding: 7px 14px;z-index: 10000;}.jqsfield { color: white;font-size: 14;text-align: right;}
    </style>

    <script type="text/javascript">
        //var idUser = <?php echo json_encode($_SESSION["id"]); ?>;
        //alert(idUser);
    </script>

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
                            <img src="../../assets/images/av1.png" name="Profile Picture" id="Profile Picture" class="img-circle img-user media-object">
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
                            <a href="#">
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
                  <!-- Alerts -->
                  <!--@include('layouts.alert');-->

                  <!-- Main Content -->
                  <!--@yield('content');-->
                  <div id="page-content">
                    <div class="row">
                      <div class="col-md-12 col-lg-12">
                        
                        <div class="panel">
                          <div class="panel-heading">
                            <h3 class="panel-title">Metricas</h3>
                          </div>
                          <form id="frmMetricas" name= "frmMetricas" class="form-vertical" action= "../controller/altaMetricas.php" method="post" onsubmit="sendRequest(); return false;" >
                            <div class="panel-body">
                              <!-- Fecha -->
                              <div class="form-group">
                                <label for="dtFecha" class="control-label">Fecha: </label>
                                <input type="date" class="form-control" name="dtFecha" id="dtFecha" required/>
                              </div>

                              <!-- Expresión -->
                              <div class="form-group">
                                <label for="sltExpresion" class="control-label">Expresión: </label>
                                <select id = "sltExpresion" name = "sltExpresion" class="form-control" required> 
                                <?php
                                  $sDBServer = "localhost";
                                  $sDBName = "proyecto_ajax";
                                  $sDBUsername = "root";
                                  $sDBPassword = "";

                                  $link = mysqli_connect($sDBServer, $sDBUsername, $sDBPassword, $sDBName);
                                  $tildes = $link->query("SET NAMES 'utf8'");
                                  $select="select expression from expressions"; 
                                  $resultExpression = mysqli_query($link, $select);
                                  while($row =mysqli_fetch_array($resultExpression)){
                                    echo "<option>".$row['expression']."</option>";
                                  }
                                ?>
                                </select>
                              </div>

                              <!-- Tipos de Expresión -->
                              <div class="form-group">
                                <label for="  " class="control-label">Tipo de Expresión: </label>
                                <select id = "sltExpresionType" name = "sltExpresionType" class="form-control" required> 
                                <?php
                                  $sDBServer = "localhost";
                                  $sDBName = "proyecto_ajax";
                                  $sDBUsername = "root";
                                  $sDBPassword = "";

                                  $link = mysqli_connect($sDBServer, $sDBUsername, $sDBPassword, $sDBName);
                                  $tildes = $link->query("SET NAMES 'utf8'"); 
                                  $select="select expression_type from expressions_types";

                                  $resultExpressionType = mysqli_query($link, $select);
                                  while($row =mysqli_fetch_array($resultExpressionType)){
                                    echo "<option>".$row['expression_type']."</option>";
                                  }
                                ?>
                                </select>
                              </div>

                              <!-- Metrica -->
                              <!--<div class="form-group">
                                <label for = "sltMetrica" class="control-label">Metrica: </label>
                                <select id = 'sltMetrica' name = 'sltMetrica' class='form-control' required>
                                  <?php
                                    /*$select="select metric from metrics"; 
                                    $result = mysqli_query($link, $select);
                                    while($row =mysqli_fetch_array($result)){
                                      echo "<option>".$row['metric']."</option>";
                                    }*/
                                  ?>        
                                </select>
                              </div>-->

                              <!-- Usuario -->
                              <div class="form-group">
                                <label for="txtUsuario" class="control-label">Usuario: </label>
                                <input type="text" class="form-control" name="txtUsuario" id="txtUsuario" required readonly/>
                              </div>
                              <script type="text/javascript">
                                //document.getElementById('txtUsuario').value(idUser);
                              </script>

                              <!-- Numero total de errores -->
                              <div class="form-group">
                                <label for="nbrNumeroErrores" class="control-label">N&uacute;mero total de errores: </label>
                                <input type="number" class="form-control" id="nbrNumeroErrores" name = "nbrNumeroErrores" min = "0" required/>
                              </div>

                              <!-- Lista de errores por reactivo-->
                              <div class="form-group">
                                <label for="editorErrores" class="control-label">Lista de errores por reactivo: </label>
                                <textarea id="editorErrores" name="editorErrores" rows="10" cols="80" class="form-control" style="width:100%;" readonly></textarea>
                                <?php
                                  $sDBServer = "localhost";
                                  $sDBName = "proyecto_ajax";
                                  $sDBUsername = "root";
                                  $sDBPassword = "";

                                  $link = mysqli_connect($sDBServer, $sDBUsername, $sDBPassword, $sDBName);
                                  $tildes = $link->query("SET NAMES 'utf8'");
                                  
                                  $selectAnswers="select equation, answer from given_answers";
                                  $resultAnswers = mysqli_query($link, $selectAnswers);
                                  $resultsAnswers = '';
                                  $select="select equation from equations";
                                  
                                  $resultEquation = mysqli_query($link, $select);
                                  //$row =mysqli_fetch_array($result);
                                  $resultsEquations = '';
                                  while ($rowAnswers =mysqli_fetch_array($resultAnswers)) {
                                    while($row =mysqli_fetch_array($resultEquation)){
                                        //$rowAnswers =mysqli_fetch_array($resultAnswers);
                                        if($row['equation'] == $rowAnswers['equation']){
                                          //$resultsEquations .= $row['equation']."&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;".$rowAnswers['answer']."<br/>";
                                          $resultsEquations .= $row['equation']."\t\t\t\t".$rowAnswers['answer']."\\n";
                                        }else{
                                          //$resultsEquations .= $row['equation']."<br/>";
                                          $resultsEquations .= $row['equation']."\\n";
                                        }
                                      //$resultsAnswers .= $row['answer']."<br/>";
                                    }
                                  }
                                ?>
                                <script>
                                    // Replace the <textarea id="editor1"> with a CKEditor
                                    // instance, using default configuration.
                                    
                                    /*CKEDITOR.replace('editorErrores');
                                    CKEDITOR.instances['editorErrores'].setData('<strong>Expresiones</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Errores/Ultima Repuesta</strong><br/><?php echo $resultsEquations?>');*/

                                    //CKEDITOR.instances.editorErrores.insertText("hola");
                                </script>
                              </div>

                              <!-- Lista de frecuencias de tipos de error-->
                              <div class="form-group">
                                <label for="frecuenciaErrores" class="control-label">Lista de frecuencias de tipos de error: </label>
                                <textarea id="frecuenciaErrores" name="frecuenciaErrores" rows="10" cols="80" class="form-control" style="width:100%;" readonly></textarea>
                                <?php
                                  $sDBServer = "localhost";
                                  $sDBName = "proyecto_ajax";
                                  $sDBUsername = "root";
                                  $sDBPassword = "";

                                  $link = mysqli_connect($sDBServer, $sDBUsername, $sDBPassword, $sDBName);
                                  $tildes = $link->query("SET NAMES 'utf8'"); 
                                  $select ="select likely_answer, count from likely_answers"; 
                                  $resultLikelyAnswer = mysqli_query($link, $select);
                                  //$row =mysqli_fetch_array($result);
                                  $resultsLikelyAnswers = '';
                                  while($row =mysqli_fetch_array($resultLikelyAnswer)){
                                    //$resultsLikelyAnswers .= $row['likely_answer']."&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;".$row['count']."<br/>";
                                    $resultsLikelyAnswers .= $row['likely_answer']."\t\t\t".$row['count']."\\n";
                                  }
                                ?>
                                <script>
                                    // Replace the <textarea id="editor1"> with a CKEditor
                                    // instance, using default configuration.
                                    /*CKEDITOR.replace('frecuenciaErrores');
                                    CKEDITOR.instances['frecuenciaErrores'].setData('<strong>Tipo de error</strong>&nbsp;&nbsp;&nbsp;&nbsp;<strong>Frecuencia</strong><br/><?php echo $resultsLikelyAnswers?>');*/

                                </script>
                              </div>

                              <!-- Hora de inicio -->
                              <div class="form-group">
                                <label for="nbrHrInicio" class="control-label col-md-2">Tiempo de inicio: </label>
                                <input type="number" class="col-md-1" id="nbrHrInicio" name="nbrHrInicio"min="0" max="23" required/>
                                <label class="control-label col-md-1">hr. </label>
                                <input type="number" class="col-md-1" id="nbrMinInicio" name="nbrMinInicio" min="0" max="59" required/>
                                <label class="control-label col-md-1">min. </label>
                              </div><br/><br/>

                              <!-- Hora de finalizacion -->
                              <div class="form-group">
                                <label for="nbrHrFin" class="control-label col-md-2">Tiempo de t&eacute;rmino: </label>
                                <input type="number" class="col-md-1" id="nbrHrFin" name="nbrHrFin" min="0" max="23" required/>
                                <label class="control-label col-md-1">hr. </label>
                                <input type="number" class="col-md-1" id="nbrMinFin" name ="nbrMinFin" min="0" max="59" required/>
                                <label class="control-label col-md-1">min. </label>
                              </div><br/><br/>

                            </div>

                            <div class="panel-footer">
                              <div class="row">
                                <div class="col-sm-3 col-sm-offset-9">
                                <button class="btn btn-lg btn-info btn-labeled fa fa-save fa-lg" type="submit">Guardar</button>
                                <button class="btn btn-lg btn-warning btn-labeled fa fa-repeat fa-lg" type="reset">Limpiar</button>
                                </div>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
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
                  Made with <i class="fa fa-heart"></i> by <a class="text-primar    y" href="https://github.com/anuarml">Anuar Morales</a>
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
    <!-- <script src="../../assets/js/nifty.min.js" type="text/javascript"></script> -->

	<!-- ZXML -->
	<script type="text/javascript" src="../../assets/js/zxml.js"></script>

    <!-- Controller -->
    <script type="text/javascript">
        var idUser = <?php echo json_encode($_SESSION["id"]); ?>;
        //alert(idUser);
        $('#txtUsuario').val(idUser);
        
        $('#editorErrores').val('Expresiones\t\tErrores/Ultima Repuesta\n<?php echo $resultsEquations?>');
        $('#frecuenciaErrores').val('Tipo de error\t\tFrecuencia\n<?php echo $resultsLikelyAnswers?>');

        /* CKEDITOR.instances['editorErrores'].setData('<strong>Expresiones</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Errores/Ultima Repuesta</strong><br/><?php echo $resultsEquations?>');
        CKEDITOR.instances['frecuenciaErrores'].setData('<strong>Tipo de error</strong>&nbsp;&nbsp;&nbsp;&nbsp;<strong>Frecuencia</strong><br/><?php echo $resultsLikelyAnswers?>');*/
        function validateForm() {
            var theForm = $('form[name="frmMetricas"]')
            return checkForm(theForm);
        }

        function checkForm(theForm) {
            //var textbox_mistakes = CKEDITOR.instances.editorErrores.getData();
			      //var textbox_frequency = CKEDITOR.instances.frecuenciaErrores.getData();
            var textbox_mistakes = $('#editorErrores').val();
            var textbox_frequency = $('#frecuenciaErrores').val();
            //console.log(textbox_mistakes);
            if (textbox_mistakes === '') {
                alert('Complete la informaci\u00F3n de los errores en el editor de texto');
                return false;
            }
			     if (textbox_frequency === '') {
                alert('Complete la informaci\u00F3n de los errores en el editor de texto');
                return false;
            }
            return true;
        }


        function sendRequest() {
            if(validateForm()){
              var oForm = document.forms[0];
              var sBody = getRequestBody(oForm);
              var oXmlHttp = zXmlHttp.createRequest();
              oXmlHttp.open("post", oForm.action, true);
              oXmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

              oXmlHttp.onreadystatechange = function () {
                  if (oXmlHttp.readyState == 4) {
                      if (oXmlHttp.status == 200) {
                          
                          saveResult(oXmlHttp.responseText);
                          //window.location = "Metricas.php";
                      } else {
                          saveResult("Ocurrio un error: " + oXmlHttp.statusText);
                      }
                  }
              };
              //sBody[editorErrores];
              //console.log(sBody);
              oXmlHttp.send(sBody);
            }else{
              return false;
            }
        }

        function getRequestBody(oForm) {
            //funcion que devuelve una cadena de consulta
            var aParams = new Array();
            for (var i = 0; i < oForm.elements.length; i++) {
                var sParam = encodeURIComponent(oForm.elements[i].name);
                sParam += "=";
                //if(i==5 || i==6){
                  //sParam += encodeURIComponent(oForm.elements[i].value);
                //}else{
                  sParam += encodeURIComponent(oForm.elements[i].value);
                //}
               
                aParams.push(sParam);
            }
            aParams.push(sParam);
            //console.log(CKEDITOR.instances.editorErrores.getData());
            //aParams[5]+=$('#editorErrores').value();
            //aParams[6]+=CKEDITOR.instances.frecuenciaErrores.getData();
            console.log(aParams);
            return aParams.join("&");
        }

        function saveResult(sMensaje) {

            //var divStatus = document.getElementById("divStatus");
            //divStatus.innerHTML = sMensaje;
            alert(sMensaje);
            //alert(sMensaje);

        }

        function salir() {
            window.location = "login.php";
        }


       //$('textarea#editorErrores').ckeditor().editor.insertText("hoola");
        //CKEDITOR.instances['editorErrores'].setData("hola");
    </script>

    </body>
</html>