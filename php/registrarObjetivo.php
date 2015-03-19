<?php
include("conexionDB.php");

$conexion = mysql_connect($host,$user,$contrasena) or die ("Error al conectar con servidor: ".mysql_error());
mysql_select_db($basedatos) or die ("Error al conectar con bases de datos: ".mysql_error());

//$sql = "INSERT INTO objetivo VALUES ('$_POST[codigoObj]','$_POST[nombreObj]', '$_POST[fechaIniObj]', '$_POST[fechafinObj]', '$_POST[montoObj]', '$_POST[descripcionObj]',    'PRDIMA01'    ,'$_POST[estadoObj]')";

$codP=$_COOKIE['codP'];

$saldoProy = "SELECT pro_monto_disponible FROM proyecto WHERE pro_id='$codP'";
$resultSaldo = mysql_query($saldoProy);
$montoProyDispo;
if($row = mysql_fetch_array($resultSaldo)){
	//trim para eleminar espacios en blanco de la cadena
	$montoProyDispo= trim($row[0]);
}


$codOP=$_COOKIE['codOP']; $nameOP=$_COOKIE['nameOP']; $dateIniOP=$_COOKIE['dateIniOP']; $datefinOP=$_COOKIE['datefinOP']; 
$montoOP=$_COOKIE['montoOP']; $descriOP=$_COOKIE['descripOP']; $estadoOP=$_COOKIE['estadoOP'];

//Actualizando el monto disponible del proyecto
$montoProyDispo = $montoProyDispo - $montoOP;
$sql = "UPDATE proyecto SET pro_monto_disponible='$montoProyDispo' WHERE pro_id = '$codP' ";
$result = mysql_query($sql);



$codMP=$_COOKIE['codMP']; $nameMP=$_COOKIE['nameMP']; $dateIniMP=$_COOKIE['dateIniMP']; $datefinMP=$_COOKIE['datefinMP']; 
$montoMP=$_COOKIE['montoMP']; $descriMP=$_COOKIE['descripMP']; $estadoMP=$_COOKIE['estadoMP'];

$montoDispoObj = $montoOP - $montoMP;
$sqlOb = "INSERT INTO objetivo VALUES ('$codOP','$nameOP','$dateIniOP','$datefinOP','$montoOP','$descriOP','$codP','$estadoOP', '$montoDispoObj')";
$result2 = mysql_query($sqlOb);



$codAP=$_COOKIE['codAP']; $nameAP=$_COOKIE['nameAP']; $dateIniAP=$_COOKIE['dateIniAP']; $datefinAP=$_COOKIE['datefinAP']; 
$montoAP=$_COOKIE['montoAP']; $descriAP=$_COOKIE['descriAP']; $estadoAP=$_COOKIE['estadoAP'];

$montoMetaDispo = $montoMP - $montoAP;
$sqlMeta = "INSERT INTO meta VALUES ('$codMP','$nameMP','$dateIniMP','$datefinMP','$montoMP','$descriMP','$codOP','$estadoMP', '$montoMetaDispo')";
$result3 = mysql_query($sqlMeta);


$sqlAct = "INSERT INTO actividad VALUES ('$codAP','$nameAP','$dateIniAP','$datefinAP','$montoAP','$descriAP','$codMP','$estadoAP', '$montoAP')";
$result4 = mysql_query($sqlAct);



//$result = mysql_query($sql);
//$respuesta = new stdClass();

if(!$result || !$result2 || !$result3 || !$result4 ){
	echo "No se pudo agregar el objetivo: ".mysql_error();
	//$respuesta->mensaje ="Error en la sentencia";
}else{
	echo "Objetivo agregado.";
	//echo "<br><a href='../agregarObjetivo.html'> Agregar objetivo </a> ";
	//echo "<br><a href='../agregarMeta.html'> Agregar meta </a> ";
	//$respuesta->mensaje ="Objetivo agregado";
}
@mysql_close($conexion);
//echo json_encode($respuesta);

?>