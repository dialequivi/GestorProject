<?php
include("conexionDB.php");

$conexion = mysql_connect($host,$user,$contrasena) or die ("Error al conectar con servidor: ".mysql_error());
mysql_select_db($basedatos) or die ("Error al conectar con bases de datos: ".mysql_error());

//SELECT pro_id FROM `proyecto` WHERE `pro_id` = 'PRDIMA02' 
$Codig = $_POST['codigoProy'];

$sql = "SELECT pro_nombre FROM proyecto WHERE pro_id = '$Codig' ";
//('$_POST[codigoProy]','$_POST[nombreProy]', '$_POST[fechaIniProy]', '$_POST[fechafinProy]', '$_POST[montoProy]', '//$_POST[descripcionProy]', '123456','$_POST[estadoProy]')";

$result = mysql_query($sql);
$obtenido = "disponible";
if($row = mysql_fetch_array($result)){
	//trim para eleminar espacios en blanco de la cadena
	$obtenido= trim($row[0]);
}

//$respuesta = new stdClass();//nuevo Ajax

if(!$result){
	echo "Error en la sentencia SQL ".mysql_error();
	//$respuesta->mensaje ="Error al consultar la base de datos.";//nuevo Ajax
}else if( strcmp($obtenido, "disponible") != 0 ){
	$obtenido = "no disponible";

	//echo "<br><a href='agregarObjetivo.html'> Agregar objetivo </a> ";
	//$respuesta->mensaje = "Se hizo la consulta.";//nuevo Ajax
}

echo "Código de proyecto ".$obtenido;

@mysql_close($conexion);


//echo json_encode($respuesta);//nuevo Ajax

//echo "registro";
//echo "$_POST[fechaIniProy]";
//echo "Proyecto creado!";
//echo "<br><a href='../agregarObjetivo.html'> Agregar objetivo </a> ";

?>