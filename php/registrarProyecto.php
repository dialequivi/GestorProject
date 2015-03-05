<?php
include("conexionDB.php");

$conexion = mysql_connect($host,$user,$contrasena) or die ("Error al conectar con servidor: ".mysql_error());
mysql_select_db($basedatos) or die ("Error al conectar con bases de datos: ".mysql_error());
	//$arreglo = json_decode(stripslashes($_POST['datosFormulario']));
//echo "Verificando...Cookie: ". $_COOKIE['codAP']. " name_ ".$_COOKIE['nameAP']." nameProy: ".$_COOKIE['nameP'];
	//echo "Verificando...". $arreglo[0] . " nobmre: ". $arreglo[22];
$cedula = $_COOKIE['cedulaUser'];
$codP=$_COOKIE['codP']; $nameP=$_COOKIE['nameP']; $dateIniP=$_COOKIE['dateIniP']; $datefinP=$_COOKIE['datefinP']; 
$montoP=$_COOKIE['montoP']; $descriP=$_COOKIE['descripcionP']; $estadoP=$_COOKIE['estadoP'];

$sql = "INSERT INTO proyecto VALUES ('$codP','$nameP','$dateIniP','$datefinP','$montoP','$descriP','$cedula', '$estadoP')";
$result = mysql_query($sql);


$codOP=$_COOKIE['codOP']; $nameOP=$_COOKIE['nameOP']; $dateIniOP=$_COOKIE['dateIniOP']; $datefinOP=$_COOKIE['datefinOP']; 
$montoOP=$_COOKIE['montoOP']; $descriOP=$_COOKIE['descripOP']; $estadoOP=$_COOKIE['estadoOP'];

$sqlOb = "INSERT INTO objetivo VALUES ('$codOP','$nameOP','$dateIniOP','$datefinOP','$montoOP','$descriOP','$codP','$estadoOP')";
$result2 = mysql_query($sqlOb);


$codMP=$_COOKIE['codMP']; $nameMP=$_COOKIE['nameMP']; $dateIniMP=$_COOKIE['dateIniMP']; $datefinMP=$_COOKIE['datefinMP']; 
$montoMP=$_COOKIE['montoMP']; $descriMP=$_COOKIE['descripMP']; $estadoMP=$_COOKIE['estadoMP'];

$sqlMeta = "INSERT INTO meta VALUES ('$codMP','$nameMP','$dateIniMP','$datefinMP','$montoMP','$descriMP','$codOP','$estadoMP')";
$result3 = mysql_query($sqlMeta);

$codAP=$_COOKIE['codAP']; $nameAP=$_COOKIE['nameAP']; $dateIniAP=$_COOKIE['dateIniAP']; $datefinAP=$_COOKIE['datefinAP']; 
$montoAP=$_COOKIE['montoAP']; $descriAP=$_COOKIE['descriAP']; $estadoAP=$_COOKIE['estadoAP'];

$sqlAct = "INSERT INTO actividad VALUES ('$codAP','$nameAP','$dateIniAP','$datefinAP','$montoAP','$descriAP','$codMP','$estadoAP')";
$result4 = mysql_query($sqlAct);

if(!$result || !$result2 || !$result3 || !$result4 ){
	echo "No se pudo registrar el proyecto: ".mysql_error();
}else{
	echo "Se creo el proyecto: ".$nameP;
	//echo "<br><a href='agregarObjetivo.html'> Agregar objetivo </a> ";
}
@mysql_close($conexion);

//echo "Registro hecho";

?>