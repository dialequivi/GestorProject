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


//OBTENEMOS ADEMAS LAS FECHAS Y EL MONTO DISPONIBLE PARA CONDICIONAR la actividad A AGREGAR
$saldoMeta = "SELECT me_fecha_inicio, me_fecha_fin, me_monto_disponible FROM meta WHERE me_id='$codMP'";
$resultado = mysql_query($saldoMeta);
$dataMeta = array();
if($row2 = mysql_fetch_array($resultado)){
	$dataMeta[0] = $row2['me_fecha_inicio'];
	$dataMeta[1] = $row2['me_fecha_fin'];
	$dataMeta[2] = $row2['me_monto_disponible'];		
	//Se ha encontrado el ID del proyecto en la BD para agregar el objetivo. Entonces se consulta el monto disponible y fechas
	//echo $row['pro_fecha_inicio']."_".$row['pro_fecha_fin']."_".$row['pro_monto_disponible'];
}

echo $ini.($rest+1)."_".$dataMeta[0]."_".$dataMeta[1]."_".$dataMeta[2];

//echo json_encode($llaves);//mario
//echo json_encode( $sigteCod[0].".".($sigteCod[1]+1) );
?>