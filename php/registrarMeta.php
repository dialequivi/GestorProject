<?php
include("conexionDB.php");

$conexion = mysql_connect($host,$user,$contrasena) or die ("Error al conectar con servidor: ".mysql_error());
mysql_select_db($basedatos) or die ("Error al conectar con bases de datos: ".mysql_error());

//$sql = "INSERT INTO meta VALUES ('$_POST[codigoMeta]','$_POST[nombreMeta]', '$_POST[fechaIniMeta]', '$_POST[fechafinMeta]', '$_POST[montoMeta]', '$_POST[descripcionMeta]', '1','$_POST[estadoMeta]')";



$codOP=$_COOKIE['codOP'];

$saldoObj = "SELECT obj_monto_disponible FROM objetivo WHERE obj_id='$codOP'";
$resultSaldo = mysql_query($saldoObj);
$montoObjDispo;
if($row = mysql_fetch_array($resultSaldo)){
	//trim para eleminar espacios en blanco de la cadena
	$montoObjDispo= trim($row[0]);
}


$codMP=$_COOKIE['codMP']; $nameMP=$_COOKIE['nameMP']; $dateIniMP=$_COOKIE['dateIniMP']; $datefinMP=$_COOKIE['datefinMP']; 
$montoMP=$_COOKIE['montoMP']; $descriMP=$_COOKIE['descripMP']; $estadoMP=$_COOKIE['estadoMP'];

//Actualizando el monto disponible del objetivo
$montoObjDispo = $montoObjDispo - $montoMP;
$sql = "UPDATE objetivo SET obj_monto_disponible='$montoObjDispo' WHERE obj_id = '$codOP' ";
$result = mysql_query($sql);


$codAP=$_COOKIE['codAP']; $nameAP=$_COOKIE['nameAP']; $dateIniAP=$_COOKIE['dateIniAP']; $datefinAP=$_COOKIE['datefinAP']; 
$montoAP=$_COOKIE['montoAP']; $descriAP=$_COOKIE['descriAP']; $estadoAP=$_COOKIE['estadoAP'];

$montoMetaDispo = $montoMP - $montoAP;
$sqlMeta = "INSERT INTO meta VALUES ('$codMP','$nameMP','$dateIniMP','$datefinMP','$montoMP','$descriMP','$codOP','$estadoMP', '$montoMetaDispo')";
$result3 = mysql_query($sqlMeta);

$montoActiDispo = $montoAP - 0;
$sqlAct = "INSERT INTO actividad VALUES ('$codAP','$nameAP','$dateIniAP','$datefinAP','$montoAP','$descriAP','$codMP','$estadoAP', '$montoActiDispo')";
$result4 = mysql_query($sqlAct);



//$result = mysql_query($sql);
///$respuesta = new stdClass();//nuevo Ajax

if(!$result || !$result3 || !$result4){
	echo "No se puedo agregar la meta: ".mysql_error();
	
}else{
	echo "Meta agregada!";
	
	//$respuesta->mensaje ="Meta agregada!";//nuevo Ajax
}
@mysql_close($conexion);
//echo json_encode($respuesta);//nuevo Ajax
?>