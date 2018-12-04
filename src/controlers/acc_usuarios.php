<?php
include("../../class/Autoload.php");
session_start();

	$codigo_usu 				=$_POST['codigo_usu'];
	$login_usu					=$_POST['login_usu'];
	$pass_usu 					=$_POST['pass_usu']);
	$perioso_uso_usu 			=$_POST['perioso_uso_usu'];
	$email_usu 				    =$_POST['email_usu'];
    $confirmacion_mail_usu 		=$_POST['confirmacion_mail_usu'];
    $usuario_crea_usu 			=$_POST['usuario_crea_usu'];
    $fecha_crea_usu 			=$_POST['fecha_crea_usu'];
	$estado_usu 				=$_POST['estado_usu'];
 	 
	 if ($codigo_usu>0){ 	 
			 $U = new Usuarios();
			 $U->update($codigo_usu,$login_usu,$pass_usu,$perioso_uso_usu,$email_usu,$confirmacion_mail_usu,$fecha_crea_usu,$usuario_crea_usu,$estado_usu);
	 }else{
 			 $U = new Usuarios();
			 $U->insertar($codigo_usu,$login_usu,$pass_usu,$perioso_uso_usu,$email_usu,$confirmacion_mail_usu,$fecha_crea_usu,$usuario_crea_usu,$estado_usu);

	 }
	 	 	
?>