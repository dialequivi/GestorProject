<?php
include("conexionDB.php");
$conexion = mysql_connect($host,$user,$contrasena) or die ("Error al conectar con servidor: ".mysql_error());
mysql_select_db($basedatos) or die ("Error al conectar con bases de datos: ".mysql_error());

	if(isset($_POST['codigoProyMontoDisp'])){
		$codP = $_POST['codigoProyMontoDisp'];
		//echo "El código de proyecto para consultar el monto disponible es: ".$codiProy;

		$saldoProy = "SELECT pro_fecha_inicio, pro_fecha_fin, pro_monto_disponible FROM proyecto WHERE pro_id='$codP'";
		$resultado = mysql_query($saldoProy);
		
		if(mysql_num_rows($resultado) > 0){
			//trim para eleminar espacios en blanco de la cadena
			//$montoProyDispo= trim($row[0]);
			//echo $montoProyDispo; //Se ha encontrado el ID del proyecto en la BD para agregar el objetivo. Entonces se consulta el monto disponible
			$datosProyect = array();
			$a = 0;
			while($row = mysql_fetch_array($resultado)){
				if($a == 0){
					$datosProyect[] = $row['pro_fecha_inicio'];
				}else if($a == 1){
					$datosProyect[] = $row['pro_fecha_fin'];
				}else{
					$datosProyect[] = $row['pro_monto_disponible'];
				}
				$a++;

			}
			echo $datosProyect;
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