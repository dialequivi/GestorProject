<?php
include("conexionDB.php");

$conexion = mysql_connect($host,$user,$contrasena) or die ("Error al conectar con servidor: ".mysql_error());
mysql_select_db($basedatos) or die ("Error al conectar con bases de datos: ".mysql_error());

//$codP=$_COOKIE['codP'];
//$consulta = "SELECT obj_id FROM objetivo WHERE proyecto_pro_id = 'dima2'";
//$result = mysql_query($consulta);

//$objetivos = array(); //Se crea un array


/*if(mysql_num_rows($result) > 0){
	//trim para eleminar espacios en blanco de la cadena
	//$obtenido= trim($row[0]);
	//array_push($objetivos, $row[0]);
	$llaves = array();
	while ($row = mysql_fetch_array($result)) {
		$llaves[] = $row['obj_id'];
		//$llaves[] = $row;
	}
}*///mario

$codOP = $_COOKIE['codOP'];
$sql = "SELECT MAX(me_id) FROM meta WHERE objetivo_obj_id = '$codOP' "; //SELECT MAX(`obj_id`) FROM `objetivo` WHERE `proyecto_pro_id`='PRDIMA01'
$result2 = mysql_query($sql);

$ultimo = "NONE";

if($row = mysql_fetch_array($result2)){
	//trim para eleminar espacios en blanco de la cadena
	//$ultimo= trim($row[0]);
	$llaves = $row[0];
}

$rest = substr($llaves, -1);//devuelve el ultimo digito
$ini = substr($llaves, 0, -1);//devuelve los primero caracteres menos el ultimo


//OBTENEMOS ADEMAS LAS FECHAS Y EL MONTO DISPONIBLE PARA CONDICIONAR LA META A AGREGAR
$saldoObj = "SELECT obj_fecha_inicio, obj_fecha_fin, obj_monto_disponible FROM objetivo WHERE obj_id='$codOP'";
$resultado = mysql_query($saldoObj);
$dataObj = array();
if($row2 = mysql_fetch_array($resultado)){
	$dataObj[0] = $row2['obj_fecha_inicio'];
	$dataObj[1] = $row2['obj_fecha_fin'];
	$dataObj[2] = $row2['obj_monto_disponible'];		
	//Se ha encontrado el ID del proyecto en la BD para agregar el objetivo. Entonces se consulta el monto disponible y fechas
	//echo $row['pro_fecha_inicio']."_".$row['pro_fecha_fin']."_".$row['pro_monto_disponible'];
}

echo $ini.($rest+1)."_".$dataObj[0]."_".$dataObj[1]."_".$dataObj[2];

//echo json_encode($llaves);//mario
//echo json_encode( $sigteCod[0].".".($sigteCod[1]+1) );
?>