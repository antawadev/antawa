<?php
class personas_sitio extends Entidad{

	public $codigo_pesi;
	public $origen_destino_pesi;
	public $latitud_pesi;
	public $longitud_pesi;
	public $usuario_crea_pesi;
	public $fecha_crea_pesi;
	public $estado_pesi;

	function __construct(){
					
	}		
		
	public function insertar($codigo_pesi,$origen_destino_pesi,$latitud_pesi,$longitud_pesi,$usuario_crea_pesi,$fecha_crea_pesi,$estado_pesi){
						$conexion	= new conexion ();
						$sql		= "INSERT INTO personas_sitio VALUES ('',";
							if ( $codigo_pesi!=""){  				$sql.="'$codigo_pesi',";}else{ 				  $sql.="NULL,"; }
							if ( $origen_destino_pesi!=""){  		$sql.="'$origen_destino_pesi',";}else{ 		  $sql.="NULL,"; }
							if ( $latitud_pesi!=""){  				$sql.="'$latitud_pesi',";}else{ 			  $sql.="NULL,"; }
							if ( $longitud_pesi!=""){  		        $sql.="'$longitud_pesi',";}else{		      $sql.="NULL,"; }
							if ( $usuario_crea_pesi!=""){  			$sql.="'$usuario_crea_pesi',";}else{ 		  $sql.="NULL,"; }
							if ( $fecha_crea_pesi!=""){  			$sql.="'$fecha_crea_pesi',";}else{ 			  $sql.="NULL,"; }
							if ( $estado_pesi!=""){  			    $sql.="'$estado_pesi',";}else{ 		          $sql.="NULL,"; }
							
						$sql        = trim($sql, ',');
						$sql       .=" );";
						echo $sql;
						//echo "<br>";
						$resultado 	= mysql_query($sql) or die ('ERROR:\"class.personas_sitio.insertar: '. mysql_error());
						$insert_row = mysql_fetch_row($resultado);
						$AUD		= new Auditoria($sql);	
						$conexion->desConexion();
						return mysql_insert_id ();
	}
		
	public function actualizar($codigo_pesi,$origen_destino_pesi,$latitud_pesi,$longitud_pesi,$usuario_crea_pesi,$fecha_crea_pesi,$estado_pesi){
						$conexion	= new conexion();
						$sql        = "UPDATE personas_sitio SET ";
							  if($codigo_pesi!=""){				   $sql=$sql."codigo_pesi='$codigo_pesi',";}
							  if($origen_destino_pesi!=""){		   $sql=$sql."origen_destino_pesi='$origen_destino_pesi',";}
							  if($latitud_pesi!=""){			   $sql=$sql."latitud_pesi='$latitud_pesi',";}
							  if($longitud_pesi!=""){		       $sql=$sql."longitud_pesi='$longitud_pesi',";}
							  if($usuario_crea_pesi!=""){          $sql=$sql."usuario_crea_pesi='$usuario_crea_pesi',";}
							  if($fecha_crea_pesi!=""){			   $sql=$sql."fecha_crea_pesi='$fecha_crea_pesi',";}
							  if($estado_pesi!=""){			       $sql=$sql."estado_pesi='$estado_pesi',";}
						$sql 		= trim($sql, ',');						
						$sql	   .= " WHERE codigo_pesi =$codigo_pesi";
						//echo $sql;
						//echo "<br>";
						$resultado  = mysql_query($sql) or die ('ERROR:\"class.personas_sitio.actualizar: '. mysql_error());
						$AUD		= new Auditoria($sql);							
						$conexion->desConexion();
						return true;
	}

}
?>