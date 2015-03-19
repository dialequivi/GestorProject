<?php
include("conexionDB.php");
$conexion = mysql_connect($host,$user,$contrasena) or die ("Error al conectar con servidor: ".mysql_error());
mysql_select_db($basedatos) or die ("Error al conectar con bases de datos: ".mysql_error());

	if(isset($_POST['codigoProyMontoDisp'])){
		$codP = $_POST['codigoProyMontoDisp'];
		//echo "El código de proyecto para consultar el monto disponible es: ".$codiProy;

		$saldoProy = "SELECT pro_monto_disponible FROM proyecto WHERE pro_id='$codP'";
		$resultado = mysql_query($saldoProy);
		$montoProyDispo;
		if($row = mysql_fetch_array($resultado)){
			//trim para eleminar espacios en blanco de la cadena
			$montoProyDispo= trim($row[0]);
			echo $montoProyDispo; //Se ha encontrado el ID del proyecto en la BD para agregar el objetivo. Entonces se consulta el monto disponible
		}
		else{
			echo "-1"; // Es un pr
		}

	}
	else if (!isset($_POST['codigoProyMontoDisp'])){
		echo "-1"; //No hay plata. Se entiende que se esta es creando un proyecto nuevo más no agregando un objetivo.
	}

	//echo "para actualizar";
?>