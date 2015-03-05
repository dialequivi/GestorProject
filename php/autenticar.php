<?php

include("conexionDB.php");
$conexion = mysql_connect($host,$user,$contrasena) or die ("Error al conectar con servidor: ".mysql_error());
mysql_select_db($basedatos) or die ("Error al conectar con bases de datos: ".mysql_error());

session_start();
$usuario = $_POST["username"];
$clave = $_POST["contrasena"];
//echo "Hola ".$usuario;

//Consulta SQL
$sql="SELECT usu_cedula, usu_nombre_completo FROM usuario WHERE usu_nombre_user = '$usuario' AND usu_contrasena = '$clave' ";
//$sql="SELECT usu_cedula, usu_nombre_completo, usu_contrasena FROM usuario WHERE usu_cedula = '".$_POST['cedula']."' AND usu_contrasena = '".$_POST['contrasena']."'";
$recibido = mysql_query($sql);
$row = mysql_fetch_array($recibido);
$cont = mysql_num_rows($recibido);//numero de registros

if($cont == 0){//
	echo "Usuario no registrado";
}
else if($cont == 1){
	//echo "Hola ",$row['usu_nombre_completo'];
	//variables de sesión
	$_SESSION['user'] = $row['usu_nombre_completo'];
	$_SESSION['cedu'] = $row['usu_cedula'];
	//echo $_SESSION["nombre"];
	header("Location:../home.php");
	
}



?>
