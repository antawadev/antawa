<?php
include("../../class/Autoload.php");
session_start();

    $codigo_men;                      =$_POST['codigo_men'];
	$orden_men;                       =$_POST['orden_men'];
	$descripcion_men;                 =$_POST['descripcion_men'];
	$padre_men;                       =$_POST['padre_men'];
	$link_men;                        =$_POST['link_men'];
	$usuario_crea_men;                =$_POST['usuario_crea_men'];
	$fecha_crea_men;                  =$_POST['fecha_crea_men'];
	$estado_men;                      =$_POST['estado_men'];
	
 	 
	 if ($codigo_aud>0){ 	 
			 $U = new Menu();
			 $U->actualizar($codigo_men,$orden_men,$descripcion_men,$padre_men,$link_men,$usuario_crea_men,$fecha_crea_men,$estado_men);
	 }else{
 			 $U = new Menu();
			 $U->insertar($codigo_men,$orden_men,$descripcion_men,$padre_men,$link_men,$usuario_crea_men,$fecha_crea_men,$estado_men);
	 } 	 	
?>