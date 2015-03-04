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
        <?php
            $id=0;
            while($row = mysql_fetch_array ($result))
            {
            echo "
            <div class=\"container\">
              <div clas=\"row\">
                <div class=\"span12\">
                  <div class=\"accordion\" id=\"myaccordion\">
                    <div class=\"accordion-group\">

                      <div class=\"accordion-heading\">
                        <a class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#myaccordion\" href=\"#$id\">
                          <div class=\"panel panel-primary\">
                            <div class=\"panel-heading\">
                              <h1 class=\"panel-title\">
                                Proyecto: $row[pro_nombre]
                              </h1>
                            </div>
                          </div>
                        </a>
                      </div>

                      <div id=\"$id\" class=\"accordion-body collapse\">
                        <div class=\"accordion-inner\">
                          <div class=\"panel panel-primary\">
                            <div class=\"panel-body\">
                               <table class=\"table table-condensed\">
                                    <tbody>
                                      <tr class=\"active\"></tr>
                                      <tr class=\"success\"></tr>
                                      <tr class=\"warning\"></tr>
                                      <tr class=\"danger\"></tr>
                                    </tbody>
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
                                        <TD class=\"active\"> $row[pro_id]</TD>
                                        <TD class=\"success\"> $row[pro_nombre]</TD>
                                        <TD class=\"warning\"> $row[pro_fecha_inicio]</TD>
                                        <TD class=\"danger\"> $row[pro_fecha_fin]</TD>
                                        <TD class=\"active\"> $row[pro_monto]</TD>
                                        <TD class=\"success\"> $row[pro_descripcion]</TD>
                                        <TD class=\"warning\"> $row[usuario_usu_cedula]</TD>
                                        <TD class=\"danger\"> $row[estado_est_id]</TD>
                                    </TR>
                                </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            "
            ;
            $id=$id+1;
            }
            mysql_close($conex) 
        ?>

    </div>

        <script src="bootstrap-3.3.2-dist/js/jquery.js"></script>
        <script src="bootstrap-3.3.2-dist/js/bootstrap.min.js"></script>
        <script src="bootstrap-3.3.2-dist/js/bootstrap.js" type="text/javascript"></script>
  </body>

