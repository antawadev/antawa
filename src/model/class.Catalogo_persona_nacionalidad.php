<?php
class catalogo_persona_nacionalidad extends Entidad{

	public $codigo_cpn;
	public $codigo_internacional_cpn;
	public $pais_cpn;
	public $gentilicio_cpn;
	public $usuario_crea_cpn;
	public $fecha_crea_cpn;
	public $estado_cpn;
  
	function __construct(){
					
	}		
		
	public function insertar($codigo_cpn,$codigo_internacional_cpn,$pais_cpn,$gentilicio_cpn,$usuario_crea_cpn,$fecha_crea_cpn,$estado_cpn){
						$conexion	= new conexion ();
						$sql		= "INSERT INTO catalogo_persona_nacionalidad VALUES ('',";
							if ( $codigo_internacional_cpn!=""){  	$sql.="'$codigo_internacional_cpn',";}else{ $sql.="NULL,"; }
							if ( $pais_cpn!=""){  					$sql.="'$pais_cpn',";}else{ 				$sql.="NULL,"; }
							if ( $gentilicio_cpn!=""){  			$sql.="'$gentilicio_cpn',";}else{ 			$sql.="NULL,"; }
							if ( $usuario_crea_cpn!=""){  			$sql.="'$usuario_crea_cpn',";}else{			$sql.="NULL,"; }
							if ( $fecha_crea_cpn!=""){  			$sql.="'$fecha_crea_cpn',";}else{ 			$sql.="NULL,"; }
							if ( $estado_cpn!=""){  				$sql.="'$estado_cpn',";}else{ 				$sql.="NULL,"; }
						$sql 		= trim($sql, ',');
						$sql	   .=" );";
						echo $sql;
						//echo "<br>";
						$resultado 	= mysql_query($sql) or die ('ERROR:\"class.catalogo_persona_nacionalidad.insertar: '. mysql_error());
						$insert_row	= mysql_fetch_row($resultado);
						$AUD		= new Auditoria($sql);	
						$conexion->desConexion();
						return mysql_insert_id ();
	}
		
	public function actualizar($codigo_cpn,$codigo_internacional_cpn,$pais_cpn,$gentilicio_cpn,$usuario_crea_cpn,$fecha_crea_cpn,$estado_cpn){
						$conexion	= new conexion();
						$sql		= "UPDATE catalogo_persona_nacionalidad SET ";
								if($codigo_internacional_cpn!=""){	$sql=$sql."codigo_internacional_cpn='$codigo_internacional_cpn',";}
								if($pais_cpn!=""){					$sql=$sql."pais_cpn='$pais_cpn',";}
								if($gentilicio_cpn!=""){			$sql=$sql."gentilicio_cpn='$gentilicio_cpn',";}
								if($usuario_crea_cpn!=""){			$sql=$sql."usuario_crea_cpn='$usuario_crea_cpn',";}
								if($fecha_crea_cpn!=""){			$sql=$sql."fecha_crea_cpn='$fecha_crea_cpn',";}
								if($estado_cpn!=""){				$sql=$sql."estado_cpn='$estado_cpn',";}
						$sql 		= trim($sql, ',');						
						$sql	   .=" WHERE codigo_cpn =$codigo_cpn";
						//echo $sql;
						//echo "<br>";
						$resultado 	= mysql_query($sql) or die ('ERROR:\"class.catalogo_persona_nacionalidad.actualizar: '. mysql_error());
						$AUD		= new Auditoria($sql);							
						$conexion->desConexion();
						return true;
	}

}
?>