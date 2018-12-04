<?php
class catalogo_persona_tipo extends Entidad{

	public $codigo_cpt;
	public $nombre_cpt;
	public $usuario_crea_cpt;
	public $fecha_crea_cpt;
	public $estado_cpt;
  
	function __construct(){
					
	}		
		
	public function insertar($codigo_cpt,$nombre_cpt,$usuario_crea_cpt,$fecha_crea_cpt,$estado_cpt){
						$conexion	= new conexion ();
						$sql		= "INSERT INTO catalogo_persona_tipo VALUES ('',";
                                    if ( $nombre_cpt!=""){  		$sql.="'$nombre_cpt',";}else{ 		$sql.="NULL,"; }
                                    if ( $usuario_crea_cpt!=""){  	$sql.="'$usuario_crea_cpt',";}else{ $sql.="NULL,"; }
                                    if ( $fecha_crea_cpt!=""){  	$sql.="'$fecha_crea_cpt',";}else{ 	$sql.="NULL,"; }
                                    if ( $estado_cpt!=""){  		$sql.="'$estado_cpt',";}else{		$sql.="NULL,"; }
						$sql 		= trim($sql, ',');
						$sql	   .=" );";
						//echo $sql;
						//echo "<br>";
						$resultado 	= mysql_query($sql) or die ('ERROR:\"class.catalogo_persona_tipo.insertar: '. mysql_error());
						$insert_row	= mysql_fetch_row($resultado);
						$AUD		= new Auditoria($sql);	
						$conexion->desConexion();
						return mysql_insert_id ();
	}
		
	public function actualizar($codigo_cpt,$nombre_cpt,$usuario_crea_cpt,$fecha_crea_cpt,$estado_cpt){
						$conexion	= new conexion();
						$sql		= "UPDATE catalogo_persona_tipo SET ";
                                    if($nombre_cpt!=""){		$sql=$sql."nombre_cpt='$nombre_cpt',";}
                                    if($usuario_crea_cpt!=""){	$sql=$sql."usuario_crea_cpt='$usuario_crea_cpt',";}
                                    if($fecha_crea_cpt!=""){	$sql=$sql."fecha_crea_cpt='$fecha_crea_cpt',";}
                                    if($estado_cpt!=""){		$sql=$sql."estado_cpt='$estado_cpt',";}
						$sql 		= trim($sql, ',');						
						$sql	   .=" WHERE codigo_cpt =$codigo_cpt";
						//echo $sql;
						//echo "<br>";
						$resultado 	= mysql_query($sql) or die ('ERROR:\"class.catalogo_persona_tipo.actualizar: '. mysql_error());
						$AUD		= new Auditoria($sql);							
						$conexion->desConexion();
						return true;
	}

}
?>