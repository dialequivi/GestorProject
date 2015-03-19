<?php
include("conexionDB.php");

$conexion = mysql_connect($host,$user,$contrasena) or die ("Error al conectar con servidor: ".mysql_error());
mysql_select_db($basedatos) or die ("Error al conectar con bases de datos: ".mysql_error());

$codProy = $_COOKIE['codP'];
$sql = "SELECT MAX(obj_id) FROM objetivo WHERE proyecto_pro_id = '$codProy' "; //SELECT MAX(`obj_id`) FROM `objetivo` WHERE `proyecto_pro_id`='PRDIMA01'

$result = mysql_query($sql);
$ultimo = "NONE";
if($row = mysql_fetch_array($result)){
	//trim para eleminar espacios en blanco de la cadena
	$ultimo= trim($row[0]);
}

$sigteCod = explode(".",$ultimo);

//OBTENEMOS ADEMAS LAS FECHAS Y EL MONTO DISPONIBLE PARA CONDICIONAR LE OBJETIVO A AGREGAR
$saldoProy = "SELECT pro_fecha_inicio, pro_fecha_fin, pro_monto_disponible FROM proyecto WHERE pro_id='$codProy'";
$resultado = mysql_query($saldoProy);
$dataProyecto = array();
if($row2 = mysql_fetch_array($resultado)){
	$dataProyecto[0] = $row2['pro_fecha_inicio'];
	$dataProyecto[1] = $row2['pro_fecha_fin'];
	$dataProyecto[2] = $row2['pro_monto_disponible'];		
	//Se ha encontrado el ID del proyecto en la BD para agregar el objetivo. Entonces se consulta el monto disponible y fechas
	//echo $row['pro_fecha_inicio']."_".$row['pro_fecha_fin']."_".$row['pro_monto_disponible'];
}



echo $sigteCod[0].".".($sigteCod[1]+1)."_".$dataProyecto[0]."_".$dataProyecto[1]."_".$dataProyecto[2];

@mysql_close($conexion);

?>