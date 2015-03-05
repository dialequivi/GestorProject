<?php
include("conexionDB.php");

$conexion = mysql_connect($host,$user,$contrasena) or die ("Error al conectar con servidor: ".mysql_error());
mysql_select_db($basedatos) or die ("Error al conectar con bases de datos: ".mysql_error());

//$sql = "INSERT INTO meta VALUES ('$_POST[codigoMeta]','$_POST[nombreMeta]', '$_POST[fechaIniMeta]', '$_POST[fechafinMeta]', '$_POST[montoMeta]', '$_POST[descripcionMeta]', '1','$_POST[estadoMeta]')";



$codOP=$_COOKIE['codOP'];
$codMP=$_COOKIE['codMP']; $nameMP=$_COOKIE['nameMP']; $dateIniMP=$_COOKIE['dateIniMP']; $datefinMP=$_COOKIE['datefinMP']; 
$montoMP=$_COOKIE['montoMP']; $descriMP=$_COOKIE['descripMP']; $estadoMP=$_COOKIE['estadoMP'];

$sqlMeta = "INSERT INTO meta VALUES ('$codMP','$nameMP','$dateIniMP','$datefinMP','$montoMP','$descriMP','$codOP','$estadoMP')";
$result3 = mysql_query($sqlMeta);


$codAP=$_COOKIE['codAP']; $nameAP=$_COOKIE['nameAP']; $dateIniAP=$_COOKIE['dateIniAP']; $datefinAP=$_COOKIE['datefinAP']; 
$montoAP=$_COOKIE['montoAP']; $descriAP=$_COOKIE['descriAP']; $estadoAP=$_COOKIE['estadoAP'];

$sqlAct = "INSERT INTO actividad VALUES ('$codAP','$nameAP','$dateIniAP','$datefinAP','$montoAP','$descriAP','$codMP','$estadoAP')";
$result4 = mysql_query($sqlAct);



//$result = mysql_query($sql);
///$respuesta = new stdClass();//nuevo Ajax

if(!$result3 || !$result4){
	echo "No se puedo agregar la meta: ".mysql_error();
	
}else{
	echo "Meta agregada!";
	
	//$respuesta->mensaje ="Meta agregada!";//nuevo Ajax
}
@mysql_close($conexion);
//echo json_encode($respuesta);//nuevo Ajax
?>