<?php
/*include("conexionDB.php");
$conexion = mysql_connect($host,$user,$contrasena) or die ("Error al conectar con servidor: ".mysql_error());
mysql_select_db($basedatos) or die ("Error al conectar con bases de datos: ".mysql_error());

	if(isset($_POST['codigoProyMontoDisp'])){
		$codP = $_POST['codigoProyMontoDisp'];
		//echo "El código de proyecto para consultar el monto disponible es: ".$codiProy;

		$saldoProy = "SELECT pro_fecha_inicio, pro_fecha_fin, pro_monto_disponible FROM proyecto WHERE pro_id='$codP'";
		$resultado = mysql_query($saldoProy);
		
		if($row = mysql_fetch_array($resultado)){
			
			//Se ha encontrado el ID del proyecto en la BD para agregar el objetivo. Entonces se consulta el monto disponible y fechas
			echo $row['pro_fecha_inicio']."_".$row['pro_fecha_fin']."_".$row['pro_monto_disponible'];
		}
		else{
			echo "-1"; // Es un pr
		}

	}
	else if (!isset($_POST['codigoProyMontoDisp'])){
		echo "-1"; //No hay plata. Se entiende que se esta es creando un proyecto nuevo más no agregando un objetivo.
	}*/

	echo "para actualizar";
?>