<?php 
	//FALTA ORGANIZAR LO DEL ARCHIVO ADJUNTO PARA PODER EJECUTAR LA SENTENCIA Y AGREGUE A LA BD
include("conexionDB.php");
$conexion = mysql_connect($host,$user,$contrasena) or die ("Error al conectar con servidor: ".mysql_error());
mysql_select_db($basedatos) or die ("Error al conectar con bases de datos: ".mysql_error());


	//Verificar tipo de archivo adjuntado
	//$adjuntosPermitidos = array("image/jpg", "imagle/jpeg", "image/gif", "image/png");
$codMP = $_COOKIE['codMP'];

$saldoMeta = "SELECT me_monto_disponible FROM meta WHERE me_id='$codMP'";
$resultSaldo = mysql_query($saldoMeta);
$montoMetaDispo;
if($row = mysql_fetch_array($resultSaldo)){
	//trim para eleminar espacios en blanco de la cadena
	$montoMetaDispo= trim($row[0]);
}




$codAP=$_COOKIE['codAP']; $nameAP=$_COOKIE['nameAP']; $dateIniAP=$_COOKIE['dateIniAP']; $datefinAP=$_COOKIE['datefinAP']; 
$montoAP=$_COOKIE['montoAP']; $descriAP=$_COOKIE['descriAP']; $estadoAP=$_COOKIE['estadoAP'];


//Actualizando el monto disponible de la meta
$montoMetaDisp = $montoMetaDispo - $montoAP;
$sql = "UPDATE meta SET me_monto_disponible='$montoMetaDisp' WHERE me_id = '$codMP' ";
$result = mysql_query($sql);

$montoActiDispo = $montoAP - 0;
$sqlAct = "INSERT INTO actividad VALUES ('$codAP','$nameAP','$dateIniAP','$datefinAP','$montoAP','$descriAP','$codMP','$estadoAP', '$montoActiDispo')";
$result = mysql_query($sqlAct);


/*	'$_POST[montoActi]', '$_POST[descripcionActi]', 
	'$ADJUNTO',
	'1.1',
	'$_POST[estadoActi]' )";*/

if(!$result){
	echo "No se puedo agregar la actividad: ".mysql_error();
	
}else{
	echo "Actividad agregada!";
	
	//$respuesta->mensaje ="Meta agregada!";//nuevo Ajax
}
@mysql_close($conexion);

?>
