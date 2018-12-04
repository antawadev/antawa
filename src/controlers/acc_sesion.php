<?php
include("../../class/Autoload.php");
session_start();

	$codigo_ses 				=$_POST['codigo_ses'];
	$login_ses					=$_POST['login_ses'];
	$pass_ses 					=$_POST['pass_ses']);
	$navegador_ses 			    =$_POST['navegador_ses'];
	$ip_ses 				    =$_POST['ip_ses'];
    $fh_inicio_ses 		        =$_POST['fh_inicio_ses'];
    $fh_fin_ses 			    =$_POST['fh_fin_ses'];
    $estado_ses 			    =$_POST['estado_ses'];
 	 
	 if ($codigo_ses>0){ 	 
			 $U = new Usuarios();
			 $U->update($codigo_ses,$login_ses,$pass_ses,$navegador_ses,$ip_ses,$fh_inicio_ses,$fecha_crea_usu,$estado_ses);
	 }else{
 			 $U = new Usuarios();
			 $U->insertar($codigo_ses,$login_ses,$pass_ses,$navegador_ses,$ip_ses,$fh_inicio_ses,$fecha_crea_usu,$estado_ses);

	 }
	 	 	
?>