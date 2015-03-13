<?php
include("conexionDB.php");

$conexion = mysql_connect($host,$user,$contrasena) or die ("Error al conectar con servidor: ".mysql_error());
mysql_select_db($basedatos) or die ("Error al conectar con bases de datos: ".mysql_error());

$codP=$_COOKIE['codP']; $nameP=$_COOKIE['nameP']; $dateIniP=$_COOKIE['dateIniP']; $datefinP=$_COOKIE['datefinP']; 
$montoP=$_COOKIE['montoP']; $descriP=$_COOKIE['descripcionP']; $estadoP=$_COOKIE['estadoP'];

$sql = "UPDATE proyecto SET pro_nombre='$nameP', pro_fecha_inicio='$dateIniP', pro_fecha_fin='$datefinP', pro_monto='$montoP', pro_descripcion='$descriP', estado_est_id='$estadoP' WHERE pro_id = '$codP' "; //SELECT MAX(`obj_id`) FROM `objetivo` WHERE `proyecto_pro_id`='PRDIMA01'

$result = mysql_query($sql);

if(!$result ){
	echo "No se pudo modificar el proyecto: ".mysql_error();
	//$respuesta->mensaje ="Error en la sentencia";
}else{
	echo "Proyecto modificado.";
	//echo "<br><a href='../agregarObjetivo.html'> Agregar objetivo </a> ";
	//echo "<br><a href='../agregarMeta.html'> Agregar meta </a> ";
	//$respuesta->mensaje ="Objetivo agregado";
}
@mysql_close($conexion);

?>