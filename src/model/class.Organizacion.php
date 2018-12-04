<?php
class organizacion extends Entidad{

	public $codigo_org;
	public $ruc_org;
	public $nombre_org;
	public $direccion_org;
	public $email_org;
	public $telefono1_org;
	public $telefono2_org;
	public $latitud_org;
	public $longitud_org;
	public $usuario_crea_org;
	public $fecha_crea_org;
	public $estado_org;
  
	function __construct(){
					
	}		
		
	public function insertar($codigo_org,$ruc_org,$nombre_org,$direccion_org,$email_org,$telefono1_org,$telefono2_org,$latitud_org,$longitud_org,$usuario_crea_org,$fecha_crea_org,$estado_org){
						$conexion	= new conexion ();
						$sql		= "INSERT INTO organizacion VALUES ('',";
                                    if ( $ruc_org!=""){  			$sql.="'$ruc_org',";}else{ $sql.="NULL,"; }
                                    if ( $nombre_org!=""){  		$sql.="'$nombre_org',";}else{ 			$sql.="NULL,"; }
                                    if ( $direccion_org!=""){  		$sql.="'$direccion_org',";}else{ 		$sql.="NULL,"; }
                                    if ( $email_org!=""){  			$sql.="'$email_org',";}else{			$sql.="NULL,"; }
                                    if ( $telefono1_org!=""){  		$sql.="'$telefono1_org',";}else{ 		$sql.="NULL,"; }
                                    if ( $telefono2_org!=""){  		$sql.="'$telefono2_org',";}else{ 		$sql.="NULL,"; }
                                    if ( $latitud_org!=""){  		$sql.="'$latitud_org',";}else{ 			$sql.="NULL,"; }
                                    if ( $longitud_org!=""){  		$sql.="'$longitud_org',";}else{ 		$sql.="NULL,"; }
                                    if ( $usuario_crea_org!=""){  	$sql.="'$usuario_crea_org',";}else{		$sql.="NULL,"; }
                                    if ( $fecha_crea_org!=""){  	$sql.="'$fecha_crea_org',";}else{ 		$sql.="NULL,"; }
                                    if ( $estado_org!=""){  		$sql.="'$estado_org',";}else{ 			$sql.="NULL,"; }
						$sql 		= trim($sql, ',');
						$sql	   .=" );";
						//echo $sql;
						//echo "<br>";
						$resultado 	= mysql_query($sql) or die ('ERROR:\"class.organizacion.insertar: '. mysql_error());
						$insert_row	= mysql_fetch_row($resultado);
						$AUD		= new Auditoria($sql);	
						$conexion->desConexion();
						return mysql_insert_id ();
	}
		
	public function actualizar($codigo_org,$ruc_org,$nombre_org,$direccion_org,$email_org,$telefono1_org,$telefono2_org,$latitud_org,$longitud_org,$usuario_crea_org,$estado_org,$fecha_crea_org){
						$conexion	= new conexion();
						$sql		= "UPDATE organizacion SET ";
                                    if($ruc_org!=""){	      	$sql=$sql."ruc_org='$ruc_org',";}
                                    if($nombre_org!=""){		$sql=$sql."nombre_org='$nombre_org',";}
                                    if($direccion_org!=""){		$sql=$sql."direccion_org='$direccion_org',";}
                                    if($email_org!=""){			$sql=$sql."email_org='$email_org',";}
                                    if($telefono1_org!=""){		$sql=$sql."telefono1_org='$telefono1_org',";}
                                    if($telefono2_org!=""){		$sql=$sql."telefono2_org='$telefono2_org',";}
                                    if($latitud_org!=""){		$sql=$sql."latitud_org='$latitud_org',";}
                                    if($longitud_org!=""){		$sql=$sql."longitud_org='$longitud_org',";}
                                    if($usuario_crea_org!=""){	$sql=$sql."usuario_crea_org='$usuario_crea_org',";}
                                    if($fecha_crea_org!=""){	$sql=$sql."fecha_crea_org='$fecha_crea_org',";}
                                    if($estado_org!=""){		$sql=$sql."estado_org='$estado_org',";}
						$sql 		= trim($sql, ',');						
						$sql	   .=" WHERE codigo_org =$codigo_org";
						//echo $sql;
						//echo "<br>";
						$resultado 	= mysql_query($sql) or die ('ERROR:\"class.organizacion.actualizar: '. mysql_error());
						$AUD		= new Auditoria($sql);							
						$conexion->desConexion();
						return true;
	}

}
?>