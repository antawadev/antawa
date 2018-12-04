<?php
class Entidad{

	public function __construct(){
	
	}

	public function clavePrimaria($Tabla){	
		$conexion=new conexion ();
		$sql="SHOW INDEX FROM $Tabla WHERE Key_name = 'PRIMARY'";
		$resultado = $conexion->ejecutar($sql);
		$cgp = mysql_num_rows($resultado);
		if($cgp > 0){
			$agp = mysql_fetch_array($resultado);
			extract($agp);
			return($Column_name);
		}else{
			return(false);
		}
	
	}	

	public function asignar(){
		$object_vars = get_object_vars($this);
		foreach ($object_vars as $atributo => $valor) {
			$this-> {$atributo} = $_POST[$atributo];
		}
	}	
	
	public function listaObjeto($sql){
		$conexion	=new conexion ();		
		$result = $conexion->ejecutar($sql);
		$i=0;
		$lista = array();
		
		while($objetos = mysql_fetch_object($result)){
			$lista[$i]=$objetos;
			$i++;
		}
		
		return $lista;
	}

	public function listaArray($sql){
		$conexion=new conexion ();
		$result = $conexion->ejecutar($sql);
		
		while($array = mysql_fetch_array($result)){
			$lista[$i]=$array;
			$i++;
		}
		return $lista;
	}
		
	public function listaSend($sql){
				$conexion=new conexion();
				$resultado = mysql_query($sql);
				$num_campos = mysql_num_fields($resultado);
				$data="";
				while( $fila=mysql_fetch_array($resultado) ){
							for($j=0;$j<$num_campos;$j++){
									$nombre = mysql_field_name($resultado, $j);
									$data.=$fila[$nombre]."|";
												
							}
							$data.=">";	
				}
				mysql_free_result($resultado);
				$conexion->desConexion();	
				return $data;
	}
	
	public function Ejecutar($sql){
				$conexion=new conexion (); 
				$AUD=new Log_Auditoria($sql);
				$resultado = mysql_query($sql) or die ('ERROR:\"class.Entidad.ejecutar: '. mysql_error());
				$conexion->desConexion();
				return ($resultado);	
	}

}
?>
