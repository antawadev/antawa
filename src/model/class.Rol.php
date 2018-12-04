<?php
class rol extends Entidad{

	public $codigo_rol;
	public $nombre_rol;
	public $descripcion_rol;
	public $usuario_crea_rol;
	public $fecha_crea_rol;
	public $estado_rol;
  
	function __construct(){
					
	}		
		
	public function insertar($codigo_rol,$nombre_rol,$descripcion_rol,$usuario_crea_rol,$fecha_crea_rol,$estado_rol){
						$conexion	= new conexion ();
						$sql		= "INSERT INTO perfil VALUES ('',";
							if ( $nombre_rol!=""){  		$sql.="'$nombre_rol',";}else{ 		$sql.="NULL,"; }
							if ( $descripcion_rol!=""){  	$sql.="'$descripcion_rol',";}else{ 	$sql.="NULL,"; }
							if ( $usuario_crea_rol!=""){  	$sql.="'$usuario_crea_rol',";}else{	$sql.="NULL,"; }
							if ( $fecha_crea_rol!=""){  	$sql.="'$fecha_crea_rol',";}else{	$sql.="NULL,"; }
							if ( $estado_rol!=""){  		$sql.="'$estado_rol',";}else{		$sql.="NULL,"; }
						$sql 		= trim($sql, ',');
						$sql	   .=" );";
						echo $sql;
						//echo "<br>";
						$resultado 	= mysql_query($sql) or die ('ERROR:\"class.rol.insertar: '. mysql_error());
						$insert_row	= mysql_fetch_row($resultado);
						$AUD		= new Auditoria($sql);	
						$conexion->desConexion();
						return mysql_insert_id ();
	}
		
	public function actualizar($codigo_rol,$nombre_rol,$descripcion_rol,$usuario_crea_rol,$fecha_crea_rol,$estado_rol){
						$conexion	= new conexion();
						$sql		= "UPDATE rol SET ";
								if($nombre_rol!=""){		$sql=$sql."nombre_rol='$nombre_rol',";}
								if($descripcion_rol!=""){	$sql=$sql."descripcion_rol='$descripcion_rol',";}
								if($usuario_crea_rol!=""){	$sql=$sql."usuario_crea_rol='$usuario_crea_rol',";}
								if($fecha_crea_rol!=""){	$sql=$sql."fecha_crea_rol='$fecha_crea_rol',";}
								if($estado_rol!=""){		$sql=$sql."estado_rol='$estado_rol',";}
						$sql 		= trim($sql, ',');						
						$sql	   .=" WHERE codigo_per =$codigo_rol";
						//echo $sql;
						//echo "<br>";
						$resultado 	= mysql_query($sql) or die ('ERROR:\"class.rol.actualizar: '. mysql_error());
						$AUD		= new Auditoria($sql);							
						$conexion->desConexion();
						return true;
	}

}
?>