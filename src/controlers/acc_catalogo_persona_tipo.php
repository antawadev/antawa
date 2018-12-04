<?php
include("../../class/Autoload.php");
session_start();

    $codigo_cpt;                       =$_POST['codigo_cpt'];
	$nombre_cpt;                       =$_POST['nombre_cpt'];
	$usuario_crea_cpt;                 =$_POST['usuario_crea_cpt'];
	$fecha_crea_cpt;                   =$_POST['fecha_crea_cpt'];
	$estado_cpt;                       =$_POST['estado_cpt'];
 	 
	 if ($codigo_aud>0){ 	 
			 $U = new Catalogo_persona_tipo();
			 $U->actualizar($codigo_cpt,$nombre_cpt,$usuario_crea_cpt,$fecha_crea_cpt,$estado_cpt);
	 }else{
 			 $U = new Catalogo_persona_sitio();
			 $U->insertar($codigo_cpt,$nombre_cpt,$usuario_crea_cpt,$fecha_crea_cpt,$estado_cpt);
	 } 	 	
?>