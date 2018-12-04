<?php
class persona extends Entidad{

	public $codigo_pes;
	public $cedula_pes;
	public $nombres_pes;
	public $apellidos_pes;
	public $fecha_nacimiento_pes;
	public $genero_pes;
	public $nacionalidad_pes;
	public $telefono1_pes;
	public $telefono2_pes;
	public $celular1_pes;
	public $celular2_pes;
	public $foto_pes;
	public $usuario_crea_pes;
	public $fecha_crea_pes;
	public $estado_pes;
  
	function __construct(){
					
	}		
		
	public function insertar($codigo_pes,$usuario_crea_pes,$fecha_crea_pes,$estado_pes,$cedula_pes,$nombres_pes,$apellidos_pes,$fecha_nacimiento_pes,$genero_pes,$nacionalidad_pes,$telefono1_pes,$telefono2_pes,$celular1_pes,$celular2_pes,$foto_pes){
						$conexion	= new conexion ();
						$sql		= "INSERT INTO persona VALUES ('',";
							if ( $cedula_pes!=""){  			$sql.="'$cedula_pes',";}else{			$sql.="NULL,"; }
							if ( $nombres_pes!=""){  			$sql.="'$nombres_pes',";}else{ 			$sql.="NULL,"; }
							if ( $apellidos_pes!=""){  			$sql.="'$apellidos_pes',";}else{ 		$sql.="NULL,"; }
							if ( $fecha_nacimiento_pes!=""){  	$sql.="'$fecha_nacimiento_pes',";}else{ $sql.="NULL,"; }
							if ( $genero_pes!=""){  			$sql.="'$genero_pes',";}else{ 			$sql.="NULL,"; }
							if ( $nacionalidad_pes!=""){  		$sql.="'$nacionalidad_pes',";}else{		$sql.="NULL,"; }
							if ( $telefono1_pes!=""){  			$sql.="'$telefono1_pes',";}else{ 		$sql.="NULL,"; }
							if ( $telefono2_pes!=""){  			$sql.="'$telefono2_pes',";}else{ 		$sql.="NULL,"; }
							if ( $nacionalidad_pes!=""){  		$sql.="'$nacionalidad_pes',";}else{		$sql.="NULL,"; }
							if ( $celular2_pes!=""){  			$sql.="'$celular2_pes',";}else{ 		$sql.="NULL,"; }
							if ( $foto_pes!=""){  				$sql.="'$foto_pes',";}else{ 			$sql.="NULL,"; }
							if ( $usuario_crea_pes!=""){  		$sql.="'$usuario_crea_pes',";}else{ 	$sql.="NULL,"; }
							if ( $fecha_crea_pes!=""){  		$sql.="'$fecha_crea_pes',";}else{ 		$sql.="NULL,"; }
							if ( $estado_pes!=""){  			$sql.="'$estado_pes',";}else{ 			$sql.="NULL,"; }
						$sql 		= trim($sql, ',');
						$sql	   .=" );";
						echo $sql;
						//echo "<br>";
						$resultado 	= mysql_query($sql) or die ('ERROR:\"class.persona.insertar: '. mysql_error());
						$insert_row	= mysql_fetch_row($resultado);
						$AUD		= new Auditoria($sql);	
						$conexion->desConexion();
						return mysql_insert_id ();
	}
		
	public function actualizar($codigo_pes,$usuario_crea_pes,$fecha_crea_pes,$estado_pes,$cedula_pes,$nombres_pes,$apellidos_pes,$fecha_nacimiento_pes,$genero_pes,$nacionalidad_pes,$telefono2_pes,$telefono1_pes,$celular1_pes,$celular2_pes,$foto_pes){
						$conexion	= new conexion();
						$sql		= "UPDATE persona SET ";
								if($cedula_pes!=""){			$sql=$sql."cedula_pes='$cedula_pes',";}
								if($nombres_pes!=""){			$sql=$sql."nombres_pes='$nombres_pes',";}
								if($apellidos_pes!=""){			$sql=$sql."apellidos_pes='$apellidos_pes',";}		
								if($fecha_nacimiento_pes!=""){	$sql=$sql."fecha_nacimiento_pes='$fecha_nacimiento_pes',";}
								if($genero_pes!=""){			$sql=$sql."genero_pes='$genero_pes',";}
								if($nacionalidad_pes!=""){		$sql=$sql."nacionalidad_pes='$nacionalidad_pes',";}
								if($telefono1_pes!=""){			$sql=$sql."telefono1_pes='$telefono1_pes',";}
								if($telefono2_pes!=""){			$sql=$sql."telefono2_org='$telefono2_pes',";}			
								if($nacionalidad_pes!=""){		$sql=$sql."nacionalidad_pes='$nacionalidad_pes',";}
								if($celular2_pes!=""){			$sql=$sql."telefono1_pes='$celular2_pes',";}
								if($foto_pes!=""){				$sql=$sql."foto_pes='$foto_pes',";}
								if($usuario_crea_pes!=""){	   	$sql=$sql."usuario_crea_pes='$usuario_crea_pes',";}
								if($fecha_crea_pes!=""){		$sql=$sql."fecha_crea_pes='$fecha_crea_pes',";}
								if($estado_pes!=""){			$sql=$sql."estado_pes='$estado_pes',";}
						$sql 		= trim($sql, ',');						
						$sql	   .=" WHERE codigo_pes =$codigo_pes";
						//echo $sql;
						//echo "<br>";
						$resultado 	= mysql_query($sql) or die ('ERROR:\"class.persona.actualizar: '. mysql_error());
						$AUD		= new Auditoria($sql);							
						$conexion->desConexion();
						return true;
	}

}
?>