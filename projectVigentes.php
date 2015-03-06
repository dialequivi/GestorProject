<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="DIMA">
      <meta name="author" content="DIMA">
      <link rel="stylesheet" href="bootstrap-3.3.2-dist/css/bootstrap.css" type="text/css" />

    <title>Proyectos Vigentes</title>

  </head>

  <body>
    <div class="container">
    
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
                      <li><a href="#" id="crearProy">Crear proyecto</a></li>
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
                  <li><a > <p><?php session_start(); echo $_SESSION['user'];?></p> </a></li>
                  <li><a href="index.html">Salir</a></li>

                </ul>
              </div><!--/.nav-collapse -->
            </div><!--/.container-fluid -->
        </nav>
          <div class="container">
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

              $sql= "SELECT * FROM proyecto";
              $result= mysql_query($sql);

              if($result==FALSE)
              {
              echo "<BR> Hay errores en la consulta SQL";
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
                    <h4 class=\"panel-title\"><a data-toggle=\"collapse\" data-parent=\"#accordion1\" href=\"#collapse$id\">
                     Proyecto: $row[pro_nombre]
                    </a></h4>
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
                              <TD class=\"default\"> $row[usuario_usu_cedula]</TD>
                              <TD class=\"default\"> $row[estado_est_id]</TD>
                          </TR>
                        </table>
                      <!-- Objetivos -->
                        <div class=\"panel-group\" id=\"accordion2\">
                          ";
                          $sql2="SELECT * FROM objetivo WHERE proyecto_pro_id='$row[pro_id]'";
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
                                <h4 class=\"panel-title\"><a data-toggle=\"collapse\" data-parent=\"#accordion2\" href=\"#collapseInner$id$id2\">
                                  Objetivo: $row2[obj_nombre]
                                </a></h4>
                              </div>
                              <div id=\"collapseInner$id$id2\" class=\"panel-collapse collapse\">
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
                                        <TD class=\"default\"> $row2[obj_id]</TD>
                                        <TD class=\"default\"> $row2[obj_nombre]</TD>
                                        <TD class=\"default\"> $row2[obj_fecha_inicio]</TD>
                                        <TD class=\"default\"> $row2[obj_fecha_fin]</TD>
                                        <TD class=\"default\"> $row2[obj_monto]</TD>
                                        <TD class=\"default\"> $row2[obj_descripcion]</TD>
                                        <TD class=\"default\"> $row2[proyecto_pro_id]</TD>
                                        <TD class=\"default\"> $row2[estado_est_id]</TD>
                                    </TR>
                                  </table>
                                    <!-- METAS -->
                                      <div class=\"panel-group\" id=\"accordion3\">
                                        ";
                                        $sql3="SELECT * FROM meta WHERE objetivo_obj_id='$row2[obj_id]'";
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
                                              <h4 class=\"panel-title\"><a data-toggle=\"collapse\" data-parent=\"#accordion3\" href=\"#collapseInner$id$id2$id3\">
                                                Meta: $row3[me_nombre]
                                              </a></h4>
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
                                                          <TD class=\"default\"> $row3[estado_est_id]</TD>
                                                      </TR>
                                                    </table>
                                                  <!-- ACTIVIDADES-->
                                                      <div class=\"panel-group\" id=\"accordion4\">
                                                        ";
                                                        $sql4="SELECT * FROM actividad WHERE meta_me_id='$row3[me_id]'";
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
                                                              <h4 class=\"panel-title\"><a data-toggle=\"collapse\" data-parent=\"#accordion4\" href=\"#collapseInner$id$id2$id3$id4\">
                                                                Actividad: $row4[act_nombre]
                                                              </a></h4>
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
                                                                        <TD class=\"default\"> $row4[estado_est_id]</TD>
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
                ?>
              </div>
          </div>
        
        <script src="bootstrap-3.3.2-dist/js/jquery.js"></script>
        <script src="bootstrap-3.3.2-dist/js/bootstrap.min.js"></script>
        <script src="bootstrap-3.3.2-dist/js/bootstrap.js" type="text/javascript"></script>
  </body>

