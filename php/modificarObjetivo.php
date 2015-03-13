<?php
include("conexionDB.php");

$conexion = mysql_connect($host,$user,$contrasena) or die ("Error al conectar con servidor: ".mysql_error());
mysql_select_db($basedatos) or die ("Error al conectar con bases de datos: ".mysql_error());

$codOP=$_COOKIE['codOP']; $nameOP=$_COOKIE['nameOP']; $dateIniOP=$_COOKIE['dateIniOP']; $datefinOP=$_COOKIE['datefinOP']; 
$montoOP=$_COOKIE['montoOP']; $descriOP=$_COOKIE['descripOP']; $estadoOP=$_COOKIE['estadoOP'];

$sql = "UPDATE objetivo SET obj_nombre='$nameOP', obj_fecha_inicio='$dateIniOP', obj_fecha_fin='$datefinOP', obj_monto='$montoOP', obj_descripcion='$descriOP', estado_est_id='$estadoOP' WHERE obj_id = '$codOP' "; //SELECT MAX(`obj_id`) FROM `objetivo` WHERE `proyecto_pro_id`='PRDIMA01'

$result = mysql_query($sql);

if(!$result ){
	echo "No se pudo modificar el objetivo: ".mysql_error();
	//$respuesta->mensaje ="Error en la sentencia";
}else{
	echo "Objetivo modificado.".$codOP;
	//echo "<br><a href='../agregarObjetivo.html'> Agregar objetivo </a> ";
	//echo "<br><a href='../agregarMeta.html'> Agregar meta </a> ";
	//$respuesta->mensaje ="Objetivo agregado";
}
@mysql_close($conexion);

?>