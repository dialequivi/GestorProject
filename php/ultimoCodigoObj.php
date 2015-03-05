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

//$respuesta = new stdClass();//nuevo Ajax

/*if(!$result){
	echo "Error en la sentencia SQL ".mysql_error();
	//$respuesta->mensaje ="Error al consultar la base de datos.";//nuevo Ajax
}else if( strcmp($obtenido, "disponible") != 0 ){
	$obtenido = "no disponible";

	//echo "<br><a href='agregarObjetivo.html'> Agregar objetivo </a> ";
	//$respuesta->mensaje = "Se hizo la consulta.";//nuevo Ajax
}*/

echo $sigteCod[0].".".($sigteCod[1]+1);

@mysql_close($conexion);

?>