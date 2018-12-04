<?php
class usuario extends Entidad{

	public $codigo_usu;
	public $login_usu;
	public $pass_usu;
	public $perioso_uso_usu;
	public $email_usu;
	public $confirmacion_mail_usu;
	public $usuario_crea_usu;
	public $fecha_crea_usu;
	public $estado_usu;

	function __construct(){
					
	}		
		
	public function insertar($codigo_usu,$login_usu,$pass_usu,$perioso_uso_usu,$email_usu,$confirmacion_mail_usu,$usuario_crea_usu,$fecha_crea_usu,$estado_usu){
						$conexion	= new conexion ();
						$sql		= "INSERT INTO usuario VALUES ('',";
                                    if ( $codigo_usu!=""){  				$sql.="'$codigo_usu',";}else{ 				  $sql.="NULL,"; }
                                    if ( $login_usu!=""){  		            $sql.="'$login_usu',";}else{ 		          $sql.="NULL,"; }
                                    if ( $pass_usu!=""){  				    $sql.="'$pass_usu',";}else{ 			      $sql.="NULL,"; }
                                    if ( $perioso_uso_usu!=""){  		    $sql.="'$perioso_uso_usu',";}else{		      $sql.="NULL,"; }
                                    if ( $email_usu!=""){  			        $sql.="'$email_usu',";}else{ 		          $sql.="NULL,"; }
                                    if ( $confirmacion_mail_usu!=""){  	    $sql.="'$confirmacion_mail_usu',";}else{      $sql.="NULL,"; }
                                    if ( $usuario_crea_usu!=""){  			$sql.="'$usuario_crea_usu',";}else{ 		  $sql.="NULL,"; }
                                    if ( $fecha_crea_usu!=""){  			$sql.="'$fecha_crea_usu',";}else{ 		      $sql.="NULL,"; }
                                    if ( $estado_usu!=""){  			    $sql.="'$estado_usu',";}else{ 		          $sql.="NULL,"; }
						$sql        = trim($sql, ',');
                        $sql	   .=" );";
						//echo $sql;
						//echo "<br>";
						$resultado 	= mysql_query($sql) or die ('ERROR:\"class.usuario.insertar: '. mysql_error());
						$insert_row = mysql_fetch_row($resultado);
						$AUD		= new Auditoria($sql);	
						$conexion->desConexion();
						return mysql_insert_id ();
	}
		
	public function actualizar($codigo_usu,$login_usu,$pass_usu,$perioso_uso_usu,$email_usu,$confirmacion_mail_usu,$usuario_crea_usu,$fecha_crea_usu,$estado_usu){
						$conexion	    = new conexion();
						$sql            = "UPDATE usuario SET ";
                                        if($codigo_usu!=""){				    $sql=$sql."codigo_usu='$codigo_usu',";}
                                        if($login_usu!=""){		            $sql=$sql."login_usu='$login_usu',";}
                                        if($pass_usu!=""){				    $sql=$sql."pass_usu='$pass_usu',";}
                                        if($perioso_uso_usu!=""){		        $sql=$sql."longitud_pesi='$perioso_uso_usu',";}
                                        if($email_usu!=""){			        $sql=$sql."email_usu='$email_usu',";}
                                        if($confirmacion_mail_usu!=""){       $sql=$sql."confirmacion_mail_usu='$confirmacion_mail_usu',";}
                                        if($usuario_crea_usu!=""){		    $sql=$sql."usuario_crea_usu='$usuario_crea_usu,";}
                                        if($fecha_crea_usu!=""){			    $sql=$sql."fecha_crea_usu,";}
                                        if($estado_usu!=""){			        $sql=$sql."estado_usu='$estado_usu,";}
						$sql 		= trim($sql, ',');						
						$sql	   .= " WHERE codigo_usu =$codigo_usu";
						//echo $sql;
						//echo "<br>";
						$resultado  = mysql_query($sql) or die ('ERROR:\"class.usuario.actualizar: '. mysql_error());
						$AUD		= new Auditoria($sql);							
						$conexion->desConexion();
						return true;
	}

}
?>