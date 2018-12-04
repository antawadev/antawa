<?php
include("../../class/Autoload.php");
session_start();

	$codigo_pes 				=$_POST['codigo_pes'];
	$cedula_pes					=$_POST['cedula_pes'];
	$nombres_pes 			    =$_POST['nombres_pes']);
	$apellidos_pes 			    =$_POST['apellidos_pes'];
	$fecha_nacimiento_pes 		=$_POST['fecha_nacimiento_pes'];
    $genero_pes 		        =$_POST['genero_pes'];
    $nacionalidad_pes 			=$_POST['nacionalidad_pes'];
	$telefono1_pes				=$_POST['telefono1_pes'];
	$telefono2_pes 			    =$_POST['telefono2_pes']);
	$celular1_pes 			    =$_POST['celular1_pes'];
	$celular2_pes 		        =$_POST['celular2_pes'];
    $foto_pes 		            =$_POST['foto_pes'];
    $usuario_crea_pes 			=$_POST['usuario_crea_pes'];
	$fecha_crea_pes 		    =$_POST['fecha_crea_pes'];
    $estado_pes 		        =$_POST['estado_pes'];
 	 
	 if ($codigo_pes>0){ 	 
			 $U = new Usuarios();
			 $U->update($codigo_pes,$cedula_pes,$nombres_pes,$apellidos_pes,$fecha_nacimiento_pes,$genero_pes,$nacionalidad_pes,$telefono1_pes,$telefono2_pes,$celular1_pes,$celular2_pes,$foto_pes,$usuario_crea_pes,$fecha_crea_pes,$estado_pes);
	 }else{
 			 $U = new Usuarios();
			 $U->insertar($codigo_pes,$cedula_pes,$nombres_pes,$apellidos_pes,$fecha_nacimiento_pes,$genero_pes,$nacionalidad_pes,$telefono1_pes,$telefono2_pes,$celular1_pes,$celular2_pes,$foto_pes,$usuario_crea_pes,$fecha_crea_pes,$estado_pes);

	 }
	 	 	
?>