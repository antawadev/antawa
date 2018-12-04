<?php
include("../../class/Autoload.php");
session_start();

	$codigo_aud 				=$_POST['codigo_aud'];
	$tabla_aud					=$_POST['tabla_aud'];
	$sql_aud 					=$_POST['nombres_usu']);
	$operacion_aud 				=$_POST['operacion_aud'];
	$usuario_aud 				=$_POST['usuario_aud'];
	$fecha_crea_aud 			=$_POST['fecha_crea_aud'];
	$estado_aud 				=$_POST['estado_aud'];
 	 
	 if ($codigo_aud>0){ 	 
			 $U = new Usuarios();
			 $U->update($codigo_aud,$tabla_aud,$sql_aud,$operacion_aud,$usuario_aud,$fecha_crea_aud,$estado_aud);
	 }else{
 			 $U = new Usuarios();
			 $U->insertar($codigo_aud,$tabla_aud,$sql_aud,$operacion_aud,$usuario_aud,$fecha_crea_aud,$estado_aud);

	 }
	 	 	
?>