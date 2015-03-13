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
                  <li><a href="#" id="menuCrearProy" name="ms">Crear proyecto</a></li>
                  <li><a href="#" id="menuModificarProy" name="muestreMeta">Modificar proyecto</a></li>
                  <li class="divider"></li>
                  <li class="dropdown-header">Administrador</li>
                  <li><a href="#" id="esconda">Eliminar proyecto</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Consultas <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#" id="menuProyVigentes">Proyectos vigentes</a></li>
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



      <div class="panel-group" id="infoCrearProy" style="display:none;">
        <div class="container">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion1" href="#collapse1">
                      <p style="display:inline;">Proyecto:</p>
                      <p style="display:inline;" id="nameProy2"></p>

                    </a>
                    <input type="button"  class="btn btn-default" name="btnAddOb" id="btnAddOb" value="New Objetivo" />
                  </h4>
                </div>

                <div id="collapse1" class="panel-collapse collapse">
                  <div class="panel-body">
                    <a href="javascript:void(0);" onclick="SINO('tabla1')">Información de Proyecto</a>
                    <div id="tabla1" style="display: none">
                      <table class="table table-condensed">
                        <TR>
                            <TH>Identificador</TH>
                            <TH>Nombre</TH>
                            <TH>Fecha de inicio</TH>
                            <TH>Fecha de finalización</TH>
                            <TH>Monto</TH>
                            <TH>Descripción</TH>
                            <TH>Estado</TH>
                        </TR>
                        <TR>
                            <TD class="default"> <p id="codProy1"></p> </TD>
                            <TD class="default"> <p id="nameProy1"> </TD>
                            <TD class="default"> <p id="dateIniProy1"></p> </TD>
                            <TD class="default"> <p id="dateFinProy1"></p> </TD>
                            <TD class="default"> <p id="montoProy1"></p> </TD>
                            <TD class="default"> <p id="descripcionProy1"></p> </TD>
                            <TD class="default"> <p id="estadoProy1"></p> </TD>
                        </TR>
                      </table>
                    </div>
                      <!-- Objetivos -->
                            <div class="panel-group" id="accordion2" >
                                <div class="panel panel-success">
                                  <div class="panel-heading">
                                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion2" href="#collapseInner2">
                                      <p style="display:inline;">Objetivo:</p>
                                      <p style="display:inline;" id="nameObj2"></p>
                                    </a></h4>
                                  </div>
                                  <div id="collapseInner2" class="panel-collapse collapse">
                                    <div class="panel-body">
                                      <table class="table table-condensed">
                                        <TR>
                                            <TH>Identificador</TH>
                                            <TH>Nombre</TH>
                                            <TH>Fecha de inicio</TH>
                                            <TH>Fecha de finalización</TH>
                                            <TH>Monto</TH>
                                            <TH>Descripción</TH>
                                            <TH>Estado</TH>
                                        </TR>
                                        <TR>
                                          <TD class="default"> <p id="codObj1"></p> </TD>
                                          <TD class="default"> <p id="nameObj1"> </p> </TD>
                                          <TD class="default"> <p id="dateIniObj1"></p> </TD>
                                          <TD class="default"> <p id="dateFinObj1"></p> </TD>
                                          <TD class="default"> <p id="montoObj1"></p> </TD>
                                          <TD class="default"> <p id="descripcionObj1"></p> </TD>
                                          <TD class="default"> <p id="estadoObj1"></p> </TD>
                                        </TR>
                                      </table>
                                      <!-- Metas -->
                                      <div class="panel-group" id="accordion3" >
                                          <div class="panel panel-danger">
                                            <div class="panel-heading">
                                              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion3" href="#collapseInner3">
                                                <p style="display:inline;">Meta:</p>
                                                <p style="display:inline;" id="nameMet2"></p>
                                              </a></h4>
                                            </div>
                                            <div id="collapseInner3" class="panel-collapse collapse">
                                              <div class="panel-body">
                                                    <table class="table table-condensed">
                                                      <TR>
                                                          <TH>Identificador</TH>
                                                          <TH>Nombre</TH>
                                                          <TH>Fecha de inicio</TH>
                                                          <TH>Fecha de finalización</TH>
                                                          <TH>Monto</TH>
                                                          <TH>Descripción</TH>
                                                          <TH>Estado</TH>
                                                      </TR>
                                                      <TR>
                                                          <TD class="default"> <p id="codMet1"></p> </TD>
                                                          <TD class="default"> <p id="nameMet1"> </p> </TD>
                                                          <TD class="default"> <p id="dateIniMet1"></p> </TD>
                                                          <TD class="default"> <p id="dateFinMet1"></p> </TD>
                                                          <TD class="default"> <p id="montoMet1"></p> </TD>
                                                          <TD class="default"> <p id="descripcionMet1"></p> </TD>
                                                          <TD class="default"> <p id="estadoMet1"></p> </TD>
                                                      </TR>
                                                    </table>
                                                  <!-- ACTIVIDADES-->
                                                    <div class="panel-group" id="accordion4" style="display:block;" >
                                                      <div class="panel panel-info">
                                                        <div class="panel-heading">
                                                          <h4 class="panel-title"><a id="desplegar" data-toggle="collapse" data-parent="#accordion4" href="#collapseInner4">
                                                            <p style="display:inline;">Actividad:</p>
                                                            <p style="display:inline;" id="nameAct2"></p>
                                                          </a></h4>
                                                        </div>
                                                        <div id="collapseInner4" class="panel-collapse collapse">
                                                          <div class="panel-body">
                                                                <table class="table table-condensed">
                                                                  <TR>
                                                                      <TH>Identificador</TH>
                                                                      <TH>Nombre</TH>
                                                                      <TH>Fecha de inicio</TH>
                                                                      <TH>Fecha de finalización</TH>
                                                                      <TH>Monto</TH>
                                                                      <TH>Descripción</TH>
                                                                      <TH>Estado</TH>
                                                                  </TR>
                                                                  <TR>
                                                                      <TD class="default"> <p id="codAct1"></p> </TD>
                                                                      <TD class="default"> <p id="nameAct1"> </p> </TD>
                                                                      <TD class="default"> <p id="dateIniAct1"></p> </TD>
                                                                      <TD class="default"> <p id="dateFinAct1"></p> </TD>
                                                                      <TD class="default"> <p id="montoAct1"></p> </TD>
                                                                      <TD class="default"> <p id="descripcionAct1"></p> </TD>
                                                                      <TD class="default"> <p id="estadoAct1"></p> </TD>
                                                                  </TR>
                                                                </table>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div> 
                                                  <!-- ACTIVIDADES-->
                                              </div>
                                            </div>
                                          </div>
                                      </div> 
                                    <!-- METAS-->
                                    </div>
                                  </div>
                                </div>
                            </div> 
                          <!-- Objetivos -->
                  </div>
                </div>
              </div>
            </div>
        <table border=0 align=center style="display:none;">
          <tr id="filaObje">
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
          <h2 id="tituloProyecto" class="form-cproject-heading" align="center"> Crear un nuevo proyecto</h2>
          <table border=0 align=CENTER >
            <TR>
              <TD>Código: </TD>
              <TD> <input class="form-control" type="text" name="codigoProy" id="codigoProy" required> </TD>
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
                <option value=3>Cancelado</option>
                <option value=4>Inactivo</option> 

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
      <h2 id="tituloObjetivo" class="form-cproject-heading" align="center">Agregar Objetivo</h2>
      <table border=0 align=CENTER >
        <TR>
          <TD>Código: </TD>
          <TD> <p id="codigoObj" name="codigoObj"> </p> </TD>
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
            <option value=2>Finalizado</option>
            <option value=3>Cancelado</option>
            <option value=4>Inactivo</option>

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
        <h2 id="tituloMeta" class="form-cproject-heading" align="center">Agregar Meta</h2>
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
              <option value=3>Cancelado</option>
                <option value=4>Inactivo</option> 

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
          <h2 id="tituloActividad" class="form-cproject-heading" align="center">Agregar Actividad</h2>
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
            <TD> <select name="estadoActi" id="punto" >
              <option value=1>Activo</option>
              <option value=2>Finalizado</option>
              <option value=3>Cancelado</option>
                <option value=4>Inactivo</option> 

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




    <div class="panel-group" id="modificarProyecto" style="display:none;">
      <form name="datos" action='procesarDatos.php' method="get">
        <?php

        $conex = mysql_connect("localhost","root","");
        if (!$conex)
        {
          die("lo siento, error de conexion al servidor");
        }
        $conexdb = mysql_select_db("gestor_project",$conex);
        if (!$conexdb)
        {
          die("no se pudo conectar a la base de datos");
        }

        $sql= "SELECT pro_id, pro_nombre, pro_fecha_inicio, pro_fecha_fin, pro_monto, pro_descripcion, usu_nombre_completo, est_nombre FROM proyecto, usuario, estado WHERE usu_cedula = usuario_usu_cedula AND est_id = estado_est_id  GROUP BY pro_id";
        $result= mysql_query($sql);

        if($result==FALSE)
        {
          echo "<BR> Hay errores en la consulta SQL</BR>";
        }
        ?>

        <div class=\"panel-group\" id=\"accordion1\">
          <?php
          $id=0;
          while($row = mysql_fetch_array ($result))
          {
            echo "
            <div class=\"panel panel-primary\">
              <div class=\"panel-heading\">    
                 <div id=\"cont\">
                    <div id=\"cont1\">
                      <h4 class=\"panel-title\"><a data-toggle=\"collapse\" data-parent=\"#accordion1\" href=\"#collapse$id\">
                        Proyecto: $row[pro_id]  $row[pro_nombre]
                      </a></h4>
                    </div>
                   <div id=\"cont2\">   
                      <button  id=\"$row[pro_id]\" type=\"button\" class=\"btn btn-info\" name=\"btnNuevoObjPro\">Agregar Objetivo</button>
                      
                     
                   </div>
                 </div>
               
             </div>

             <div id=\"collapse$id\" class=\"panel-collapse collapse\">
              <div class=\"panel-body\">
                <table class=\"table table-condensed\">
                  <TR>
                    <TH>Identificador</TH>
                    <TH>Nombre</TH>
                    <TH>Fecha de inicio</TH>
                    <TH>Fecha de finalización</TH>
                    <TH>Monto</TH>
                    <TH>Descripción</TH>
                    <TH>Usuario reg</TH>
                    <TH>Estado</TH>
                  </TR>
                  <TR>
                    <TD class=\"default\"> $row[pro_id]</TD>
                    <TD class=\"default\"> $row[pro_nombre]</TD>
                    <TD class=\"default\"> $row[pro_fecha_inicio]</TD>
                    <TD class=\"default\"> $row[pro_fecha_fin]</TD>
                    <TD class=\"default\"> $row[pro_monto]</TD>
                    <TD class=\"default\"> $row[pro_descripcion]</TD>
                    <TD class=\"default\"> $row[usu_nombre_completo]</TD>
                    <TD class=\"default\"> $row[est_nombre]</TD>
                    <TD> <button  id=\"$row[pro_id]\" type=\"button\" class=\"btn btn-danger\" name=\"btnModifyPro\">Modificar Proyecto</button> </TD>

                  </TR>
                </table>
                <!-- Objetivos -->
                <div class=\"panel-group\" id=\"accordion2\">
                  ";
                  $sql2="SELECT obj_id, obj_nombre, obj_fecha_inicio, obj_fecha_fin, obj_monto, obj_descripcion, proyecto_pro_id, est_nombre FROM objetivo, estado WHERE proyecto_pro_id='$row[pro_id]' AND est_id=estado_est_id";
                  $result2= mysql_query($sql2);
                  if($result2==FALSE)
                  {
                    echo "<BR> Hay errores en la consulta obj SQL";
                  }
                  $id2=1000;
                  while($row2 = mysql_fetch_array ($result2))
                  {
                    echo "
                    <div class=\"panel panel-success\">
                      <div class=\"panel-heading\">
                        <div id=\"cont\">
                          <div id=\"cont1\">
                            <h4 class=\"panel-title\"><a data-toggle=\"collapse\" data-parent=\"#accordion2\" href=\"#collapseInner$id$id2\">
                                Objetivo: $row2[obj_id]  $row2[obj_nombre]
                            </a></h4>
                          </div>

                      <div id=\"cont2\">   
                        <button  id=\"$row2[obj_id]\" type=\"button\" class=\"btn btn-info\" name=\"btnNuevoMetaPro\">Agregar Meta</button>
                        
                        
                        
                      </div>
                    </div>
                  </div>


                      <div id=\"collapseInner$id$id2\" class=\"panel-collapse collapse\">
                        <div class=\"panel-body\">
                          <table id=\"$row2[obj_id]_tabla\" class=\"table table-condensed\" >
                            <TR>
                              <TH>Identificador</TH>
                              <TH>Nombre</TH>
                              <TH>Fecha de inicio</TH>
                              <TH>Fecha de finalización</TH>
                              <TH>Monto</TH>
                              <TH>Descripción</TH>
                              <TH>Proyecto</TH>
                              <TH>Estado</TH>
                            </TR>
                            <TR>
                              <TD class=\"default\"> $row2[obj_id]</TD>
                              <TD class=\"default\"> $row2[obj_nombre]</TD>
                              <TD class=\"default\"> $row2[obj_fecha_inicio]</TD>
                              <TD class=\"default\"> $row2[obj_fecha_fin]</TD>
                              <TD class=\"default\"> $row2[obj_monto]</TD>
                              <TD class=\"default\"> $row2[obj_descripcion]</TD>
                              <TD class=\"default\"> $row2[proyecto_pro_id]</TD>
                              <TD class=\"default\"> $row2[est_nombre]</TD>

                              <TD><button  type=\"button\" id=\"$row2[obj_id]\"  class=\"btn btn-danger\" name=\"btnModifyObjPro\">Modificar Objetivo</button></TD>

                            </TR>
                          </table>
                          <!-- METAS -->
                          <div class=\"panel-group\" id=\"accordion3\">
                            ";
                            $sql3="SELECT me_id, me_nombre, me_fecha_inicio, me_fecha_fin, me_monto, me_descripcion, objetivo_obj_id, est_nombre FROM meta, estado WHERE objetivo_obj_id='$row2[obj_id]' AND estado_est_id=est_id";
                            $result3= mysql_query($sql3);
                            if($result3==FALSE)
                            {
                              echo "<BR> Hay errores en la consulta obj SQL";
                            }
                            $id3=2000;
                            while($row3 = mysql_fetch_array ($result3))
                            {
                              echo "
                              <div class=\"panel panel-danger\">
                                <div class=\"panel-heading\">
                                  <div id=\"cont\">
                                    <div id=\"cont1\">
                                      <h4 class=\"panel-title\"><a data-toggle=\"collapse\" data-parent=\"#accordion3\" href=\"#collapseInner$id$id2$id3\">
                                        Meta: $row3[me_id]  $row3[me_nombre]
                                      </a></h4>
                                    </div>

                                    <div id=\"cont2\">
                                      <button  id=\"$row3[me_id]\" type=\"button\" class=\"btn btn-info\" name=\"btnNuevoActividadPro\">Agregar Actividad</button>
                                      
                                      
                                      
                                    </div> 
                                  </div>
                                </div>
                                <div id=\"collapseInner$id$id2$id3\" class=\"panel-collapse collapse\">
                                  <div class=\"panel-body\">
                                    <!-- ACTIVIDADES -->
                                    <table class=\"table table-condensed\">
                                      <TR>
                                        <TH>Identificador</TH>
                                        <TH>Nombre</TH>
                                        <TH>Fecha de inicio</TH>
                                        <TH>Fecha de finalización</TH>
                                        <TH>Monto</TH>
                                        <TH>Descripción</TH>
                                        <TH>Objetivo</TH>
                                        <TH>Estado</TH>
                                      </TR>
                                      <TR>
                                        <TD class=\"default\"> $row3[me_id]</TD>
                                        <TD class=\"default\"> $row3[me_nombre]</TD>
                                        <TD class=\"default\"> $row3[me_fecha_inicio]</TD>
                                        <TD class=\"default\"> $row3[me_fecha_fin]</TD>
                                        <TD class=\"default\"> $row3[me_monto]</TD>
                                        <TD class=\"default\"> $row3[me_descripcion]</TD>
                                        <TD class=\"default\"> $row3[objetivo_obj_id]</TD>
                                        <TD class=\"default\"> $row3[est_nombre]</TD>
                                        <TD> <button  id=\"$row3[me_id]\" type=\"button\" class=\"btn btn-danger\" name=\"btnModifyMetaPro\">Modificar Meta</button> </TD>
                                      </TR>
                                    </table>
                                    <!-- ACTIVIDADES-->
                                    <div class=\"panel-group\" id=\"accordion4\">
                                      ";
                                      $sql4="SELECT act_id, act_nombre, act_fecha_inicio, act_fecha_fin, act_monto, act_descripcion, meta_me_id, est_nombre FROM actividad, estado WHERE meta_me_id='$row3[me_id]' AND est_id= estado_est_id";
                                      $result4= mysql_query($sql4);
                                      if($result4==FALSE)
                                      {
                                        echo "<BR> Hay errores en la consulta obj SQL";
                                      }
                                      $id4=3000;
                                      while($row4 = mysql_fetch_array ($result4))
                                      {
                                        echo "
                                        <div class=\"panel panel-info\">
                                          <div class=\"panel-heading\">
                                            <div id=\"cont\">
                                              <div id=\"cont1\">
                                                <h4 class=\"panel-title\"><a data-toggle=\"collapse\" data-parent=\"#accordion4\" href=\"#collapseInner$id$id2$id3$id4\">
                                                  Actividad: $row4[act_id]  $row4[act_nombre]
                                                </a></h4>
                                              </div>
                                              <div id=\"cont2\">
                                                <!--<button  id=\"$row4[act_id]\" type=\"button\" class=\"btn btn-danger\" name=\"btnModifyActividadPro\">Modificar Actividad</button>-->
                                              </div>
                                            </div>
                                          </div>

                                          <div id=\"collapseInner$id$id2$id3$id4\" class=\"panel-collapse collapse\">
                                            <div class=\"panel-body\">
                                              <table class=\"table table-condensed\">
                                                <TR>
                                                  <TH>Identificador</TH>
                                                  <TH>Nombre</TH>
                                                  <TH>Fecha de inicio</TH>
                                                  <TH>Fecha de finalización</TH>
                                                  <TH>Monto</TH>
                                                  <TH>Descripción</TH>
                                                  <TH>Proyecto</TH>
                                                  <TH>Estado</TH>
                                                </TR>
                                                <TR>
                                                  <TD class=\"default\"> $row4[act_id]</TD>
                                                  <TD class=\"default\"> $row4[act_nombre]</TD>
                                                  <TD class=\"default\"> $row4[act_fecha_inicio]</TD>
                                                  <TD class=\"default\"> $row4[act_fecha_fin]</TD>
                                                  <TD class=\"default\"> $row4[act_monto]</TD>
                                                  <TD class=\"default\"> $row4[act_descripcion]</TD>
                                                  <TD class=\"default\"> $row4[meta_me_id]</TD>
                                                  <TD class=\"default\"> $row4[est_nombre]</TD>
                                                  <TD> <button  id=\"$row4[act_id]\" type=\"button\" class=\"btn btn-danger\" name=\"btnModifyActividadPro\">Modificar Actividad</button> </TD>
                                                </TR>
                                              </table>
                                            </div>
                                          </div>
                                        </div>
                                        ";
                                        $id4=$id4+1;
                                      }
                                      echo "
                                    </div>
                                    <!-- ACTIVIDADES-->
                                  </div>
                                </div>
                              </div>
                              ";
                              $id3=$id3+1;
                            }
                            echo "
                          </div> 
                          <!-- METAS-->
                        </div>
                      </div>
                    </div>
                    ";
                    $id2=$id2+1;
                  }
                  echo "
                </div> 
                <!-- Objetivos -->

              </div>
            </div>
          </div>
          ";
          $id=$id+1;
        }
       // echo "<script src=\"ajax.js?miVariable=oscar\" type=\"text/javascript\"></script>";
        ?>
        </div>
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
      $("#menuCrearProy").click(function(){//id crearProy - opcion del menu crear proyecto
        $.cookie('cedulaUser', <?php echo $_SESSION['cedu']; ?>);

        $('#bienvenida').hide("fast");//
        $('#modificarProyecto').hide("fast");
        $('#formNewProy').show("fast");//id formNewProy - div que contiene el formulario de crear proyecto
        //alert("La cedula es: "+$.cookie('cedulaUser'));
      });

      $('#menuModificarProy').click(function(){
          $('#bienvenida').hide("fast");
          $('#formNewProy').hide("fast");
          $('#modificarProyecto').show("fast");
      });

      $("#esconda").click(function(){
        $('#formNewProy').hide("fast");


        var bie = "wellcome";
        $('#bienvenida').attr('id', bie);

        $('#wellcome').hide('fast');
        //$('#bienvenida').show("fast");
      });

      $("#btnAddOb").click(function(){
          $("#desplegar").attr({
            'data-parent': '#objetivo',
            'href': '#colpar'
          });

          $('#collapseInner4').attr('id', 'colpar');

          $("#accordion4").clone(true).insertAfter("#accordion4").attr('id',"objetivo");

          //Restaurando valores originales
          $("#desplegar").attr({
            'data-parent': '#accordion4',
            'href': '#collapseInner4'
          });

          $('#colpar').attr('id', 'collapseInner4');
          

          //$("#accordion4")
      });

    }); 

  </script>
  
  <script>
    function SINO(cual) {
       var elElemento=document.getElementById(cual);
       if(elElemento.style.display == 'block') {
          elElemento.style.display = 'none';
       } else {
          elElemento.style.display = 'block';
       }
    }
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
