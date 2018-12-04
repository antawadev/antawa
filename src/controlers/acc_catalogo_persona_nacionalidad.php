<?php
include("../../class/Autoload.php");
session_start();
    $codigo_cpn;                       =$_POST['codigo_cpn'];
	$codigo_internacional_cpn;         =$_POST['codigo_internacional_cpn'];
	$pais_cpn;                         =$_POST['pais_cpn'];
	$gentilicio_cpn;                   =$_POST['gentilicio_cpn'];
	$usuario_crea_cpn;                 =$_POST['usuario_crea_cpn'];
	$fecha_crea_cpn;                   =$_POST['fecha_crea_aud'];
	$estado_cpn;                       =$_POST['estado_cpn'];
 	 
	 if ($codigo_aud>0){ 	 
			 $U = new Catalogo_persona_nacionalidad();
			 $U->actualizar($codigo_cpn,$codigo_internacional_cpn,$pais_cpn,$gentilicio_cpn,$usuario_crea_cpn,$fecha_crea_cpn,$estado_cpn);
	 }else{
 			 $U = new Catalogo_persona_nacionalidad();
			 $U->insertar($codigo_cpn,$codigo_internacional_cpn,$pais_cpn,$gentilicio_cpn,$usuario_crea_cpn,$fecha_crea_cpn,$estado_cpn);
	 } 	 	
?>