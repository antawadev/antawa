<?php
class auditoria extends Entidad{

	public $codigo_aud;
	public $tabla_aud;
	public $sql_aud;
	public $operacion_aud;
	public $usuario_aud;
	public $fecha_crea_aud;
	public $estado_aud;
  
	function __construct(){
					
	}		
		
	public function insertar($codigo_aud,$tabla_aud,$sql_aud,$usuario_aud,$fecha_crea_aud,$estado_aud,$operacion){
						$conexion	= new conexion ();
						$sql		= "INSERT INTO auditoria VALUES ('',";
							if ( $tabla_aud!=""){  				$sql.="'$tabla_aud',";}else{ 			$sql.="NULL,"; }
							if ( $sql_aud!=""){  				$sql.="'$sql_aud',";}else{ 				$sql.="NULL,"; }
							if ( $operacion_aud!=""){  			$sql.="'$operacion_aud',";}else{ 		$sql.="NULL,"; }
							if ( $usuario_aud!=""){  			$sql.="'$usuario_aud',";}else{ 			$sql.="NULL,"; }
							if ( $fecha_crea_aud!=""){  		$sql.="'$fecha_crea_aud',";}else{		$sql.="NULL,"; }
							if ( $estado_aud!=""){  			$sql.="'$estado_aud',";}else{ 			$sql.="NULL,"; }
						$sql 		= trim($sql, ',');
						$sql	   .=" );";
						echo $sql;
						//echo "<br>";
						$resultado 	= mysql_query($sql) or die ('ERROR:\"class.auditoria.insertar: '. mysql_error());
						$insert_row	= mysql_fetch_row($resultado);
						//$AUD		= new Sys_Auditoria($sql);	
						$conexion->desConexion();
						return mysql_insert_id ();
	}
		
	public function actualizar($codigo_aud,$tabla_aud,$sql_aud,$usuario_aud,$fecha_crea_aud,$estado_aud,$operacion_aud){
						$conexion	= new conexion();
						$sql		= "UPDATE auditoria SET ";
								if($tabla_aud!=""){			$sql=$sql."tabla_aud='$tabla_aud',";}
								if($sql_aud!=""){			$sql=$sql."sql_aud='$sql_aud',";}
								if($operacion_aud!=""){		$sql=$sql."operacion='$operaciond_aud',";}
								if($usuario_aud!=""){		$sql=$sql."usuario_aud='$usuario_aud',";}
								if($fecha_crea_aud!=""){	$sql=$sql."fecha_crea_aud='$fecha_crea_aud',";}
								if($estado_aud!=""){		$sql=$sql."estado_aud='$estado_aud',";}
						$sql 		= trim($sql, ',');						
						$sql	   .=" WHERE codigo_aud =$codigo_aud";
						//echo $sql;
						//echo "<br>";
						$resultado 	= mysql_query($sql) or die ('ERROR:\"class.auditoria.actualizar: '. mysql_error());
						//$AUD=new Sys_Auditoria($sql);							
						$conexion->desConexion();
						return true;
	}

}
?>