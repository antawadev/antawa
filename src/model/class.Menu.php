<?php
class menu extends Entidad{

	public $codigo_men;
	public $orden_men;
	public $descripcion_men;
	public $padre_men;
	public $link_men;
	public $usuario_crea_men;
	public $fecha_crea_men;
	public $estado_men;

	function __construct(){
					
	}		
		
	public function insertar($codigo_men,$orden_men,$descripcion_men,$padre_men,$link_men,$usuario_crea_men,$fecha_crea_men,$estado_men){
						$conexion	= new conexion ();
						$sql		= "INSERT INTO menu VALUES ('',";
							if ( $codigo_men!=""){  				$sql.="'$codigo_men',";}else{ 				  $sql.="NULL,"; }
							if ( $orden_men!=""){  		            $sql.="'$orden_men',";}else{ 		  		  $sql.="NULL,"; }
							if ( $descripcion_men!=""){  			$sql.="'$descripcion_men',";}else{ 			  $sql.="NULL,"; }
							if ( $padre_men!=""){  		        	$sql.="'$padre_men',";}else{		          $sql.="NULL,"; }
							if ( $link_men!=""){  		        	$sql.="'$link_men',";}else{		              $sql.="NULL,"; }
							if ( $usuario_crea_men!=""){  			$sql.="'$usuario_crea_men',";}else{ 		  $sql.="NULL,"; }
							if ( $fecha_crea_men!=""){  			$sql.="'$fecha_crea_men',";}else{ 			  $sql.="NULL,"; }
							if ( $estado_men!=""){  			    $sql.="'$estado_men',";}else{ 		          $sql.="NULL,"; }
							
						$sql        = trim($sql, ',');
						$sql       .=" );";
						//echo $sql;
						//echo "<br>";
						$resultado 	= mysql_query($sql) or die ('ERROR:\"class.menu.insertar: '. mysql_error());
						$insert_row = mysql_fetch_row($resultado);
						$AUD		= new Auditoria($sql);	
						$conexion->desConexion();
						return mysql_insert_id ();
	}
		
	public function actualizar($codigo_men,$orden_men,$descripcion_men,$padre_men,$link_men,$usuario_crea_men,$fecha_crea_men,$estado_men){
						$conexion	= new conexion();
						$sql        = "UPDATE menu SET ";
						
						    if ( $codigo_men!=""){  			$sql=$sql."codigo_men='$codigo_men',";}	
							if ( $orden_men!=""){  		        $sql=$sql."orden_men='$orden_men',";}    
							if ( $descripcion_men!=""){  		$sql=$sql."descripcion_men='$descripcion_men',";}	
							if ( $padre_men!=""){  		        $sql=$sql."padre_men='$padre_men',";}	
							if ( $link_men!=""){  		        $sql=$sql."link_men='$;link_men',";}	
							if ( $usuario_crea_men!=""){  		$sql=$sql."usuario_crea_men='$usuario_crea_men',";}	
							if ( $fecha_crea_men!=""){  		$sql=$sql."fecha_crea_men='$fecha_crea_men',";}	
							if ( $estado_men!=""){  			$sql=$sql."estado_men='$estado_men',";}    
						
						$sql 		= trim($sql, ',');						
						$sql	   .= " WHERE codigo_men =$codigo_men";
						//echo $sql;
						//echo "<br>";
						$resultado  = mysql_query($sql) or die ('ERROR:\"class.menu.actualizar: '. mysql_error());
						$AUD		= new Auditoria($sql);							
						$conexion->desConexion();
						return true;
	}
}
?>