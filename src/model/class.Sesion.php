<?php
class sesion extends Entidad{

	public $codigo_ses;
	public $login_ses;
	public $pass_ses;
	public $navegador_ses;
	public $ip_ses;
	public $fh_inicio_ses;
	public $fh_fin_ses;
	public $estado_ses;
  
	function __construct(){
					
	}		
		
	public function insertar($codigo_ses,$login_ses,$pass_ses,$navegador_ses,$ip_ses,$fh_inicio_ses,$fh_fin_ses,$estado_ses){
						$conexion	= new conexion ();
						$sql		= "INSERT INTO sesion VALUES ('',";
                                    if ( $login_ses!=""){  		$sql.="'$login_ses',";}else{ 		$sql.="NULL,"; }
                                    if ( $pass_ses!=""){  		$sql.="'$pass_ses',";}else{ 		$sql.="NULL,"; }
                                    if ( $navegador_ses!=""){  	$sql.="'$navegador_ses',";}else{ 	$sql.="NULL,"; }
                                    if ( $ip_ses!=""){  		$sql.="'$ip_ses',";}else{			$sql.="NULL,"; }
                                    if ( $fh_inicio_ses!=""){  	$sql.="'$fh_inicio_ses',";}else{ 	$sql.="NULL,"; }
                                    if ( $fh_fin_ses!=""){  	$sql.="'$fh_fin_ses',";}else{ 		$sql.="NULL,"; }
                                    if ( $$estado_ses!=""){  	$sql.="'$estado_ses',";}else{		$sql.="NULL,"; }
						$sql 		= trim($sql, ',');
						$sql	   .=" );";
						echo $sql;
						//echo "<br>";
						$resultado 	= mysql_query($sql) or die ('ERROR:\"class.sesion.insertar: '. mysql_error());
						$insert_row	= mysql_fetch_row($resultado);
						$AUD		= new Auditoria($sql);	
						$conexion->desConexion();
						return mysql_insert_id ();
	}
		
	public function actualizar($codigo_ses,$login_ses,$pass_ses,$navegador_ses,$ip_ses,$fh_fin_ses,$estado_ses,$fh_inicio_ses){
						$conexion	= new conexion();
						$sql		= "UPDATE sesion SET ";
                                    if($login_ses!=""){			$sql=$sql."login_ses='$login_ses',";}
                                    if($pass_ses!=""){			$sql=$sql."pass_ses='$pass_ses',";}
                                    if($navegador_ses!=""){		$sql=$sql."navegador_ses='$navegador_ses',";}
                                    if($ip_ses!=""){			$sql=$sql."ip_ses='$ip_ses',";}
                                    if($fh_inicio_ses!=""){		$sql=$sql."fh_inicio_ses='$fh_inicio_ses',";}
                                    if($fh_fin_ses!=""){		$sql=$sql."fh_fin_ses='$fh_fin_ses',";}
                                    if($estado_ses!=""){		$sql=$sql."estado_ses='$estado_ses',";}
						$sql 		= trim($sql, ',');						
						$sql	   .=" WHERE codigo_ses =$codigo_ses";
						//echo $sql;
						//echo "<br>";
						$resultado 	= mysql_query($sql) or die ('ERROR:\"class.sesion.actualizar: '. mysql_error());
						$AUD		= new Auditoria($sql);							
						$conexion->desConexion();
						return true;
	}

}
?>