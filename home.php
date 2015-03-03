<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../favicon.ico">

  <title>Home</title>

  <link href="bootstrap-3.3.2-dist/css/bootstrap.min.css" rel="stylesheet">

  <link href="bootstrap-3.3.2-dist/css/navbar.css" rel="stylesheet">

  <!--<script src="../../assets/js/ie-emulation-modes-warning.js"></script>-->




</head>

<body>
<?php session_start(); ?>
  <div class="container">

    <!--<p><?php echo "Bienvenido ";?></p>-->
    <!-- Static navbar -->
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
            <!--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>-->
            <a href="home.php" class="navbar-brand">DIMA</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <!--<li class="active"><a href="#">Home</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">Contact</a></li>-->
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Proyectos <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#" id="crearProy" name="ms">Crear proyecto</a></li>
                  <li><a href="#" id="muestre">Modificar proyecto</a></li>
                  <li class="divider"></li>
                  <li class="dropdown-header">Administrador</li>
                  <li><a href="#" id="esconda">Eliminar proyecto</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Consultas <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Proyectos vigentes</a></li>
                  <li><a href="#">Proyectos Ejecutados</a></li>
                  <li><a href="#">Proyectos por fecha</a></li>
                </ul>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $_SESSION['user'];?> <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="index.html">Salir</a></li>
                </ul>
              </li>
              

            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron" id="bienvenida">
        <h1>Gestión de Proyectos</h1>
        <p>Bienvenido!</p>
        <!--<p>
          <a class="btn btn-lg btn-primary" href="../../components/#navbar" role="button">View navbar docs &raquo;</a>
        </p>-->
      </div>



      <div class="jumbotron" id="infoCrearProy" style="display:none;">
        <table border=0 align=center>
          <tr>
            <td><p id="codProy" align="center"> </p></td>
            <td><p id="nameProy" align="center"> </p></td>
          </tr>
          <tr id="filaObj">
            <td><p id="codObjP" align="center"> </p></td>
            <td><p id="nameObjP" align="center"> </p></td>
            <td><p> <a class="btn btn-default" name="btnAddObj" id="btnAddObj" role="button" style="display:none;">Agregar Objetivo</a> </p></td>
          </tr>
          <tr id="filaMeta">
            <td><p id="codMetaP" align="center"> </p></td>
            <td><p id="nameMetaP" align="center"> </p></td>
            <td><p> <a class="btn btn-default" name="btnAddMeta" id="btnAddMeta" role="button" style="display:none;">Agregar Meta</a> </p></td>
          </tr>
          <tr id="filaActi">
            <td><p id="codActP" align="center"> </p></td>
            <td><p id="nameActP" align="center"> </p></td>
            <td><p> <a class="btn btn-default" name="btnAddActi" id="btnAddActi" role="button" style="display:none;">Agregar Actividad</a> </p></td>
          </tr>
        </table>
      </div>



      <!--FORMULARIO DE REGISTRO DE NUEVO PROYECTO-->

      <div class="jumbotron" id="formNewProy" style="display:none;">

        <!--<form class="form-cproject" action="php/registrarProyecto.php" method="post" enctype="multipart/form-data" name="datos" id="registrarProy">-->

        <form class="form-cproject" id="registrarProy" method="POST">
          <h2 class="form-cproject-heading" align="center"> Crear un nuevo proyecto</h2>
          <table border=0 align=CENTER >
            <TR>
              <TD>Código: </TD>
              <TD> <input class="form-control" type="text" name="codigoProy" id="codigoProy"  required> </TD>
            </TR>
            <tr>
              <TD>Nombre: </TD>
              <TD> <input class="form-control" type="text" name="nombreProy" required > 
              </TD>
            </tr>
            <tr>
              <TD>Fecha de inicio: </TD>
              <TD> <!--<input type="text" name="fechaIniProy"> -->
                <input type="date" name="fechaIniProy" step="1" min="1900-01-01" max="2099-12-31" class="form-control"  >
              </TD>
            </tr>
            <tr>
              <TD>Fecha de finalización: </TD>
              <TD> <input type="date" name="fechafinProy" step="1" min="1900-01-01" max="2099-12-31" class="form-control"  >
              </TD>
            </tr>
            <tr>
              <TD>Monto: </TD>
              <TD> <input type="number" name="montoProy" class="form-control" > </TD>
            </tr>
            <tr>
              <TD>Estado: </TD>
              <TD><select class="form-control" name="estadoProy">
                <option value=1>Activo</option>
                <option value=2>Finalizado</option>

              </select> </TD>
            </tr>
            <tr>
              <TD>Descripción: </TD>
              <TD> <textarea rows="8" cols="40" name="descripcionProy" class="form-control" > </textarea> </TD>
            </tr>

            <TR> <td> <!--<input class="btn btn-lg btn-primary btn-block" type="submit" name="registroNuevoProy" value="Registrar" />-->
             <input type="submit" class="btn btn-lg btn-primary btn-block" name="btnRegistroNuevoProy" value="Continuar"/> 
           </td>


         </TR>

       </table>
     </form> 
     <!--muestra el mensaje devuelto por registrarProyecto.php-->         
     <!--<div id="msj"></div>-->
   </div>

   <div class="jumbotron" id="formNewProy" style="display:none;">
     <h3> Respuesta: </h3>
     <div id="Mensajes">
     </div>
   </div>


   <!--FORMULARIO DE REGISTRO DE OBJETIVO-->
   <div class="jumbotron" id="formNewObj" style="display:none;">
    <form class="form-cproject" id="registrarObj">
      <h2 class="form-cproject-heading" align="center">Agregar Objetivo</h2>
      <table border=0 align=CENTER >
        <TR>
          <TD>Código: </TD>
          <TD> <p id="codigoObj" id="codigoObj"> </p> </TD>
        </TR>
        <tr>
          <TD>Nombre: </TD>
          <TD> <input type="text" name="nombreObj" required> </TD>
        </tr>
        <tr>
          <TD>Fecha de inicio: </TD>
          <TD> <!--<input type="text" name="fechaIniProy"> -->
            <input type="date" name="fechaIniObj" step="1" min="1900-01-01" max="2099-12-31" required>
          </TD>
        </tr>
        <tr>
          <TD>Fecha de finalización: </TD>
          <TD> <input type="date" name="fechafinObj" step="1" min="1900-01-01" max="2099-12-31" required>
          </TD>
        </tr>
        <tr>
          <TD>Monto: </TD>
          <TD> <input type="text" name="montoObj" required> </TD>
        </tr>
        <tr>
          <TD>Estado: </TD>
          <TD> <select name="estadoObj" >
            <option value=1>Activo</option>
            <option value=2>Finalzado</option>

          </select> </TD>
        </tr>
        <tr>
          <TD>Descripción: </TD>
          <TD> <textarea rows="8" cols="40" name="descripcionObj" required> </textarea> </TD>
        </tr>
        
        <TR> <TD> <input type="button" class="btn btn-lg btn-primary btn-block"  name="btnRegistroNuevoObj" value="Continuar" /> </TD>
          <!--<TD> <input type="button" class="btn btn-lg btn-primary btn-block" id="agregarMeta" value="Agregar Meta"
            style="display:none;" /> </TD>-->
          </TR>  
        </table>
      </form>

    </div>



    <!--FORMULARIO DE REGISTRO DE META-->
    <div class="jumbotron" id="formNewMeta" style="display:none;">
      <form class="form-cproject" id="registrarMeta">
        <h2 class="form-cproject-heading" align="center">Agregar Meta</h2>
        <table border=0 align=CENTER >
          <TR>
            <TD>Código: </TD>
            <TD> <p name="codigoMeta" id="codigoMeta"> </p></TD>
          </TR>
          <tr>
            <TD>Nombre: </TD>
            <TD> <input type="text" name="nombreMeta"> </TD>
          </tr>
          <tr>
            <TD>Fecha de inicio: </TD>
            <TD> <!--<input type="text" name="fechaIniProy"> -->
              <input type="date" name="fechaIniMeta" step="1" min="1900-01-01" max="2099-12-31">
            </TD>
          </tr>
          <tr>
            <TD>Fecha de finalización: </TD>
            <TD> <input type="date" name="fechafinMeta" step="1" min="1900-01-01" max="2099-12-31">
            </TD>
          </tr>
          <tr>
            <TD>Monto: </TD>
            <TD> <input type="text" name="montoMeta"> </TD>
          </tr>
          <tr>
            <TD>Estado: </TD>
            <TD> <select name="estadoMeta" >
              <option value=1>Activo</option>
              <option value=2>Finalizado</option>

            </select> </TD>
          </tr>
          <tr>
            <TD>Descripción: </TD>
            <TD> <textarea rows="8" cols="40" name="descripcionMeta"> </textarea> </TD>
          </tr>
          
          <TR> <TD> <input type="button" class="btn btn-lg btn-primary btn-block" name="btnRegistroNuevoMeta" value="Continuar" /> </TD>
<!--            <TD> <input type="button" class="btn btn-lg btn-primary btn-block" id="agregarAct" value="Agregar Actividad"
              style="display:none;" /> </TD>-->
            </TR> 
          </table>
        </form>
      </div>

      <!--FORMULARIO DE REGISTRO DE ACTIVIDAD-->
      <div class="jumbotron" id="formNewActi" style="display:none;">
        <form class="form-cproject" id="registrarActividad">
          <h2 class="form-cproject-heading" align="center">Agregar Actividad</h2>
          <table border=0 align=CENTER >
            <TR>
              <TD>Código: </TD>
              <TD> <p id="codigoActi" name="codigoActi"></p> </TD>
            </TR>
            <tr>
              <TD>Nombre: </TD>
              <TD> <input type="text" name="nombreActi"> </TD>
            </tr>
            <tr>
              <TD>Fecha de inicio: </TD>
              <TD> <!--<input type="text" name="fechaIniProy"> -->
                <input type="date" name="fechaIniActi" step="1" min="1900-01-01" max="2099-12-31">
              </TD>
            </tr>
            <tr>
              <TD>Fecha de finalización: </TD>
              <TD> <input type="date" name="fechafinActi" step="1" min="1900-01-01" max="2099-12-31">
              </TD>
            </tr>
            <tr>
              <TD>Monto: </TD>
              <TD> <input type="number" name="montoActi" requared pattern="[0-9]*" title="Ingrese un valor numérico"> </TD>
            </tr>
            <tr>
            <TD>Estado: </TD>
            <TD> <select name="estadoActi" id="punto" style="display:none;">
              <option value=1>Activo</option>
              <option value=2>Finalizado</option>

            </select> </TD>
          </tr>
            <tr>
              <TD>Descripción: </TD>
              <TD> <textarea rows="8" cols="40" name="descripcionActi"> </textarea> </TD>
            </tr>
           
          

          <TR> <TD> <input type="button" class="btn btn-lg btn-primary btn-block" name="btnRegistroNuevoActi" value="Registrar Proyecto"  /> </TD></TR>  
        </table>
      </form>
    </div>




  </div> <!-- /container -->



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->

    
    <script type="text/javascript" src="bootstrap-3.3.2-dist/js/jquery-1.11.2.min.js"></script>
    <!--MANEJO DE PETICIONES CON AJAX - JQUERY-->
    <script src="ajax.js"></script>
    <script src="jquery.cookie.js"></script>

    <script src="bootstrap-3.3.2-dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!-- <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>-->

    
    <!-- PARA MOSTAR Y OCULTAR ELEMENTOS DE LA PÁGINA-->    

    <script type="text/javascript">
      $(document).ready(function(){
      $("#crearProy").click(function(){//id crearProy - opcion del menu crear proyecto
        $.cookie('cedulaUser', <?php echo $_SESSION['cedu']; ?>);

        $('#bienvenida').hide("fast");//
        $('#formNewProy').show("fast");//id formNewProy - div que contiene el formulario de crear proyecto
        //alert("La cedula es: "+$.cookie('cedulaUser'));
      });
      $("#esconda").click(function(){
        $('#formNewProy').hide("fast");
        //$('#bienvenida').show("fast");
      });
    });
  </script>


  <!--GUARDAR DATOS DE CREAR NUEVO PROYECTO-->
    <!--<script>
    $(document).ready(function(){
      $("#registroNuevoProy").click(function(){//id registroNuevoProy - boton del formulario crear proyeto
        var formProy = $("#registrarProy").serializeArray();//id registrarProy - formulario
        $.ajax({
          type: "POST",
          dataType: 'json',
          url: "php/registrarProyecto.php",
          data: formProy,

          beforeSend: function(){
            alert("En breve se enviará la solicitud");
          },

        }).done(function(respuesta){
          //alert().html('Proyecto creado');
          $("#msj").html(respuesta.mensaje);
          $("#formNewProy").hide("fast");
          $('#formNewObj').show("fast");
          //limpiarformProy("#registrarProy");
        });
      });

    });
  </script>-->

  <!--GUARDAR DATOS DE UN NUEVO OBJETIVO-->
  <!--<script>
    $(document).ready(function(){
      $("#registroNuevoObj").click(function(){
        var formObj = $("#registrarObj").serializeArray();
        $.ajax({
          type: "POST",
          dataType: 'json',
          url: "php/registrarObjetivo.php",
          data: formObj,
        }).done(function(respuesta){
          //$("#msj").html(respuesta.mensaje);
          $("#agregarMeta").show("fast");
          //$('#formNewObj').show("fast");
          //limpiarformProy("#registrarProy");
        });
      });

    });
  </script>-->

  <!--SI SE HA AGREGADO UN OBJETIVO Y SE PULSA EL BOTON AGREGAR META-->
  <!--<script type="text/javascript">
    $(document).ready(function(){
      $("#agregarMeta").click(function(){//id agregarMeta - boton del formulario crear objetivo
        $('#formNewObj').hide("fast");//esconde el formulario de objetivo
        $('#formNewMeta').show("fast");//muestra el formulario de meta
      });
      
    });
  </script>-->

  <!--GUARDAR DATOS DE UN NUEVO META-->
  <!--<script>
    $(document).ready(function(){
      $("#registroNuevoMeta").click(function(){//ID BOTON
        var formMet = $("#registrarMeta").serializeArray();//ID FORMULARIO
        $.ajax({
          type: "POST",
          dataType: 'json',
          url: "php/registrarMeta.php",
          data: formMet,
        }).done(function(respuesta){
          //$("#msj").html(respuesta.mensaje);
          $("#agregarAct").show("fast");
          //$('#formNewObj').show("fast");
          //limpiarformProy("#registrarProy");
        });
      });

    });
  </script>-->


  <!--SI SE HA AGREGADO UNA META Y SE PULSA EL BOTON AGREGAR ACTIVIDAD-->
 <!-- <script type="text/javascript">
    $(document).ready(function(){
      $("#agregarAct").click(function(){//id agregarMeta - boton del formulario crear objetivo
        $('#formNewMeta').hide("fast");//esconde el formulario de meta
        $('#formNewActi').show("fast");//muestra el formulario de Atividad
      });
      
    });
  </script>-->

  <!--GUARDAR DATOS DE UNA NUEVA ACTIVIDAD-->
  <!--<script>
    $(document).ready(function(){
      $("#registroNuevoActi").click(function(){//ID BOTON
        var formAct = $("#registrarActividad").serializeArray();//ID FORMULARIO
        $.ajax({
          type: "POST",
          dataType: 'json',
          url: "php/registrarActividad.php",
          data: formAct,
        }).done(function(respuesta){
          //$("#msj").html(respuesta.mensaje);
          //$("#agregarAct").show("fast");
          //$('#formNewObj').show("fast");
          //limpiarformProy("#registrarProy");
        });
      });

    });
  </script>-->


</body>
</html>
