<?php 
	//FALTA ORGANIZAR LO DEL ARCHIVO ADJUNTO PARA PODER EJECUTAR LA SENTENCIA Y AGREGUE A LA BD
include("conexionDB.php");
$conexion = mysql_connect($host,$user,$contrasena) or die ("Error al conectar con servidor: ".mysql_error());
mysql_select_db($basedatos) or die ("Error al conectar con bases de datos: ".mysql_error());


	//Verificar tipo de archivo adjuntado
	//$adjuntosPermitidos = array("image/jpg", "imagle/jpeg", "image/gif", "image/png");
$codMP = $_COOKIE['codMP'];
$codAP=$_COOKIE['codAP']; $nameAP=$_COOKIE['nameAP']; $dateIniAP=$_COOKIE['dateIniAP']; $datefinAP=$_COOKIE['datefinAP']; 
$montoAP=$_COOKIE['montoAP']; $descriAP=$_COOKIE['descriAP']; $estadoAP=$_COOKIE['estadoAP'];

$sqlAct = "INSERT INTO actividad VALUES ('$codAP','$nameAP','$dateIniAP','$datefinAP','$montoAP','$descriAP','$codMP','$estadoAP')";
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
