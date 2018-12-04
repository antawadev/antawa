<?php
/**
* Este archivo contiene la clase para gestion de bases de datos
* @author Christian Osorio
* @package bdd
*/

/**
* Esta Clase ayuda a la gestion de in formacion sobre la base
* de datos almacenando en una tabla de log todos los cambios
* realizados sobre la base de datos 
*
*
* @package bdd
* @subpackage class 
*/
class BDD_MYSQL {

var $host;
var $puerto;
var $cliente;
var $usuario;
var $contrasena;
var $basededatos;
var $conexion;
var $sql;
var $resource;

public function __construct(){

		$this->host="localhost";
		$this->puerto="3306";
		$this->usuario="root";
		$this->contrasena="";
		$this->basededatos="pets";
		
		$this->conexion=mysql_pconnect($this->host,$this->usuario,$this->contrasena) or die(print_r("Error en la conexion con la Base de datos Mysql", true));
		
		if (!$this->conexion) {
			echo "<script type='text/javascript'>open(ccredenciales.htmlhtml,'_self');</script>";
			exit;
		}
}//Fin del constructor

public function __destruct(){
		$this->cerrar();
}//fin del destructor


/********************************************************/
/*					EJECUCION							*/
/*														*/
/********************************************************/

public function cerrar() {
		mysql_free_result($this->resource);
		mysql_close($this->conexion);
}//Fin cerrar



public function ejecutar(){
		if(!($this->resource = mysql_query($this->conexion, $this->sql))){
			return null;
		}
		return $this->resource;
	}

public function ejecutarSQL($sql){
		$this->sql=$sql;
		$result = mysql_query($this->conexion, $this->sql) or die(print_r("Error en la consulta", true));
		return $result;
}

/********************************************************/
/*			INSERTAR - ACTUALIZAR						*/
/*														*/
/********************************************************/

public function insertar($objeto){
		$tabla=get_class($objeto);
		$tabla=strtolower($tabla);
		$sql="insert into ".$tabla." (";
		
		$object_vars = get_object_vars($objeto);
		
		foreach ($object_vars as $name => $value) {
			$sql=$sql."$name ,";
			
		}
		
		$sql=substr($sql,0,strlen($sql)-1);
		$sql=$sql.") VALUES (";
		
		foreach ($object_vars as $name => $value) {
			if($name!=$this->getClavePrimaria($tabla)){
				if(gettype($value)=="integer" || gettype($value)=="double" || $value=="getdate()"){
					$sql=$sql."$value ,";
				}else{
					$sql=$sql."'$value' ,";
				}
			}	
		}
		$sql=substr($sql,0,strlen($sql)-1);
		$sql=$sql.")";
		$this->sql=$sql;
		return $this->ejecutar();
}//Fin funcion insertar

public function actualizar($objeto,$campoid,$valorid){
		$tabla=get_class($objeto);
		$tabla=strtolower($tabla);
		
		$sql="update ".$tabla." set ";
		
		$object_vars = get_object_vars($objeto);
		
		foreach ($object_vars as $name => $value) {
			if(gettype($value)=="integer" || gettype($value)=="double" || $value=="getdate()"){
				$sql=$sql."$name=$value ,";
			}else{
				$sql=$sql."$name='$value' ,";
			}
		}
		$sql=substr($sql,0,strlen($sql)-1);
		$sql=$sql." where $campoid=";

		if(gettype($valorid)=="integer" || gettype($valorid)=="double"){
			$sql=$sql."$valorid";
		}else{
			$sql=$sql."'$valorid'";
		}
		$this->sql=$sql;
		//echo $sql."<br>";
		
		$this->ejecutar();
}//Fin funcion actualizar

public function actualizarCampo($objeto,$campo,$valor,$campoid,$valorid){
		$tabla=get_class($objeto);
		$tabla=strtolower($tabla);
		
		$sql="update ".$tabla." set ";
		
		if(gettype($valor)=="integer" || gettype($valor)=="double"){
			$sql=$sql."$campo=$valor ";
		}else{
			$sql=$sql."$campo='$valor' ";
		}
		
		$sql=$sql." where $campoid=";
		if(gettype($valorid)=="integer" || gettype($valorid)=="double"){
			$sql=$sql."$valorid";
		}else{
			$sql=$sql."'$valorid'";
		}
		//echo $sql;
		$this->sql=$sql;
		$this->ejecutar();
}//Fin funcion actualizar   


public function actualizarSql($sql){
		$this->sql=$sql;
		$this->ejecutar();
}//Fin funcion actualizar   

/********************************************************/
/*					BUSQUEDAS							*/
/*														*/
/********************************************************/

public function buscarId($objeto,$campoid,$valorid){
		$tabla=get_class($objeto);
		$tabla=strtolower($tabla);
		
		$sql="Select * from ".$tabla." where $campoid=";
		if(gettype($valorid)=="integer" || gettype($valorid)=="double"){
			$sql=$sql."$valorid";
		}else{
			$sql=$sql."'$valorid'";
		}
		$sql=$sql;
		$this->sql=$sql;
		//echo $sql;
		$result = mysql_query($this->conexion,$sql) or die(print_r("Erro en la consulta", true));
		$objeto = mysql_fetch_object($result);
		return $objeto;
}

/*Esta funcion busca la lista de objetos*/
public function buscarLista($objeto,$campo,$valor,$orden){
		$i=0;
		$tabla=get_class($objeto);
		$tabla=strtolower($tabla);
		
		
		$sql="Select * from ".$tabla." where $campo=";
		
		if(gettype($valor)=="integer" || gettype($valor)=="double"){
			$sql=$sql."$valor";
		}else{
			$sql=$sql."'$valor'";
		}
		if($orden!="") $sql=$sql." order by ".$orden;
		$this->sql=$sql;
		$result = mysql_query($this->conexion,$sql) or die(print_r("Error en la consulta", true));
		
		while($objeto = mysql_fetch_object($result)){
			$objetos[$i]=$objeto;
			$i++;
		}
		return $objetos;
}

public function buscarListasql($objeto,$sql){
		$i=0;
		$tabla=get_class($objeto);
		$tabla=strtolower($tabla);
		$this->sql=$sql;
		$result = mysql_query($sql,$this->conexion) or die(print_r("Error en la consulta", true));
		
		while($objeto = mysql_fetch_object($result)){
			$objetos[$i]=$objeto;
			$i++;
		}
		return $objetos;
}

public function sqlResultadocampos($sql){
		//echo $sql;
		$this->sql=$sql;
		$result = mysql_query($this->conexion,$sql) or die(print_r("Error en la consulta", true));
		$resultado = mysql_fetch_array($result);
		return $resultado;
}

public function sqllista($sql){
		//echo $sql."<br>";
		$this->sql=$sql;
		$i=0;
		$result = mysql_query($this->conexion,$sql) or die(print_r("Error en la consulta", true));
		while($filas = mysql_fetch_array($result)){
			$lista[$i]=$filas;
			$i++;
		}
		return $lista;
}

public function sqllistaarreglo($sql){
		//echo $sql."<br>";
		$this->sql=$sql;
		$i=0;
		$result = mysql_query($this->conexion,$sql) or die(print_r("Error en la consulta", true));
		while($filas = mysql_fetch_row($result)){
			$lista[$i]=$filas;
			$i++;
		}
		return $lista;
}

public function sqlresultado($sql){
		$this->sql=$sql;
		$result = mysql_query($sql) or die(print_r("Error en la consulta", true));
		$resultado = mysql_fetch_array($result);
		return $resultado[0];
}

}//Fin de la Clase
?>

