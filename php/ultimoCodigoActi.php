<?php
include("conexionDB.php");

$conexion = mysql_connect($host,$user,$contrasena) or die ("Error al conectar con servidor: ".mysql_error());
mysql_select_db($basedatos) or die ("Error al conectar con bases de datos: ".mysql_error());


$codMP = $_COOKIE['codMP'];//codigo de la ultima meta
$sql = "SELECT MAX(act_id) FROM actividad WHERE meta_me_id = '$codMP' "; //SELECT MAX(`obj_id`) FROM `objetivo` WHERE `proyecto_pro_id`='PRDIMA01'
$result = mysql_query($sql);

$llaves = "";

if($row = mysql_fetch_array($result)){
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