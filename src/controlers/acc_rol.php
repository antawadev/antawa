<?php
include("../../class/Autoload.php");
session_start();

	$codigo_rol 				=$_POST['codigo_rol'];
	$nombre_rol					=$_POST['nombre_rol'];
	$descripcion_rol 			=$_POST['descripcion_rol']);
	$usuario_crea_rol 			=$_POST['usuario_crea_rol'];
	$fecha_crea_rol 		    =$_POST['fecha_crea_rol'];
    $estado_rol 		        =$_POST['estado_rol'];
 	 
	 if ($codigo_rol>0){ 	 
			 $U = new Usuarios();
			 $U->update($codigo_rol,$nombre_rol,$descripcion_rol,$usuario_crea_rol,$fecha_crea_rol,$estado_rol);
	 }else{
 			 $U = new Usuarios();
			 $U->insertar($codigo_rol,$nombre_rol,$descripcion_rol,$usuario_crea_rol,$fecha_crea_rol,$estado_rol);

	 }
	 	 	
?>