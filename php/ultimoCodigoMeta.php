<?php
include("conexionDB.php");

$conexion = mysql_connect($host,$user,$contrasena) or die ("Error al conectar con servidor: ".mysql_error());
mysql_select_db($basedatos) or die ("Error al conectar con bases de datos: ".mysql_error());


$codOP = $_COOKIE['codOP'];
$sql = "SELECT MAX(act_id) FROM actividad WHERE objetivo_obj_id = '$codOP' "; //SELECT MAX(`obj_id`) FROM `objetivo` WHERE `proyecto_pro_id`='PRDIMA01'
$result2 = mysql_query($sql);

$ultimo = "NONE";

if($row = mysql_fetch_array($result2)){
	//trim para eleminar espacios en blanco de la cadena
	//$ultimo= trim($row[0]);
	$llaves = $row[0];
}

$rest = substr($llaves, -1);//devuelve el ultimo digito
$ini = substr($llaves, 0, -1);//devuelve los primero caracteres menos el ultimo
//console.log("ultimo digi: ".$rest);
//$sigteCod = explode(".",$llaves);

//echo $sigteCod[0].".".($sigteCod[1]+1);
echo $ini.($rest+1);

//echo json_encode($llaves);//mario
//echo json_encode( $sigteCod[0].".".($sigteCod[1]+1) );
?>