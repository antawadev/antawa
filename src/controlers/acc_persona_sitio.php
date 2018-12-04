<?php
include("../../class/Autoload.php");
session_start();

    $codigo_pesi;                      =$_POST['codigo_pesi'];
	$origen_destino_pesi;              =$_POST['origen_destino_pesi'];
	$latitud_pesi;                     =$_POST['latitud_pesi'];
	$longitud_pesi;                    =$_POST['longitud_pesi']; 
	$usuario_crea_pesi;                =$_POST['usuario_crea_pesi'];
	$fecha_crea_pesi;                  =$_POST['fecha_crea_pesi'];
	$estado_pesi;                      =$_POST['estado_pesi'];
 	 
	 if ($codigo_aud>0){ 	 
			 $U = new Persona_sitio();
			 $U->actualizar($codigo_pesi,$origen_destino_pesi,$latitud_pesi,$longitud_pesi,$usuario_crea_pesi,$fecha_crea_pesi,$estado_pesi);
	 }else{
 			 $U = new Persona_sitio();
			 $U->insertar($codigo_pesi,$origen_destino_pesi,$latitud_pesi,$longitud_pesi,$usuario_crea_pesi,$fecha_crea_pesi,$estado_pesi);
	 } 	 	
?>