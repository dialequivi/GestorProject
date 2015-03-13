<?php
include("conexionDB.php");

$conexion = mysql_connect($host,$user,$contrasena) or die ("Error al conectar con servidor: ".mysql_error());
mysql_select_db($basedatos) or die ("Error al conectar con bases de datos: ".mysql_error());

$codAP=$_COOKIE['codAP']; $nameAP=$_COOKIE['nameAP']; $dateIniAP=$_COOKIE['dateIniAP']; $datefinAP=$_COOKIE['datefinAP']; 
$montoAP=$_COOKIE['montoAP']; $descriAP=$_COOKIE['descriAP']; $estadoAP=$_COOKIE['estadoAP'];

$sql = "UPDATE actividad SET act_nombre='$nameAP', act_fecha_inicio='$dateIniAP', act_fecha_fin='$datefinAP', act_monto='$montoAP', act_descripcion='$descriAP', estado_est_id='$estadoAP' WHERE act_id = '$codAP' "; //SELECT MAX(`obj_id`) FROM `objetivo` WHERE `proyecto_pro_id`='PRDIMA01'

$result = mysql_query($sql);

if(!$result ){
	echo "No se pudo modificar la Actividad: ".mysql_error();
	//$respuesta->mensaje ="Error en la sentencia";
}else{
	echo "Actividad modificada.";
	//echo "<br><a href='../agregarObjetivo.html'> Agregar objetivo </a> ";
	//echo "<br><a href='../agregarMeta.html'> Agregar meta </a> ";
	//$respuesta->mensaje ="Objetivo agregado";
}
@mysql_close($conexion);

?>