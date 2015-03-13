<?php
include("conexionDB.php");

$conexion = mysql_connect($host,$user,$contrasena) or die ("Error al conectar con servidor: ".mysql_error());
mysql_select_db($basedatos) or die ("Error al conectar con bases de datos: ".mysql_error());

$codMP=$_COOKIE['codMP']; $nameMP=$_COOKIE['nameMP']; $dateIniMP=$_COOKIE['dateIniMP']; $datefinMP=$_COOKIE['datefinMP']; 
$montoMP=$_COOKIE['montoMP']; $descriMP=$_COOKIE['descripMP']; $estadoMP=$_COOKIE['estadoMP'];

$sql = "UPDATE meta SET me_nombre='$nameMP', me_fecha_inicio='$dateIniMP', me_fecha_fin='$datefinMP', me_monto='$montoMP', me_descripcion='$descriMP', estado_est_id='$estadoMP' WHERE me_id = '$codMP' "; //SELECT MAX(`obj_id`) FROM `objetivo` WHERE `proyecto_pro_id`='PRDIMA01'

$result = mysql_query($sql);

if(!$result ){
	echo "No se pudo modificar la meta: ".mysql_error();
	//$respuesta->mensaje ="Error en la sentencia";
}else{
	echo "Meta modificada.";
	//echo "<br><a href='../agregarObjetivo.html'> Agregar objetivo </a> ";
	//echo "<br><a href='../agregarMeta.html'> Agregar meta </a> ";
	//$respuesta->mensaje ="Objetivo agregado";
}
@mysql_close($conexion);

?>