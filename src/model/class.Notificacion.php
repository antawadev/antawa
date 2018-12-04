<?php
class  info_usuario_eps extends Entidad {

    public $modelo_mensaje;
    public $datos_usuario;

    function __construct(){

    }

	public function info_usuario_ue($usuario,$unidad_educatica,$nombre_usuario,$password_temporal,$link_acceso){
		$this->modelo_mensaje = array("Sr. " . $usuario.
									  "Coordinador de la Unidad Educativa" . $unidad_educatica.
									  "\n\n Reciba un coordial saludo de Antawa Go SA;
									  su perfil de usuario como coordinador ha sido creado
									  con exito, favor ingrese al sigueinte link 
									  para acceder a su portal web: ");
									  
		$this->datos_usuario  = array("Usuario: " 		. $nombre_usuario.
									  "Contasena: "		. $password_temporal.
									  "Link de acceso: ". $link_acceso);
		return ($this);
	}

	public function info_usuario_eps($nombre_usuario,$unidad_educatica,$periodo,$usuario,$password_temporal,$link_acceso){
        $this->modelo_mensaje = array("Sr. " . $usuario.
                                      "Responsable de proveer el servicio de transporte escolar
                                      \n\n Reciba un coordial saludo de Antawa Go, le comunicamos
                                      que la Unidad Educativa " . $unidad_educatica.
									  "; en el periodo " .$periodo.
									  "ha generado el perfil de usuario como Empresa Proveedora de Servicio 
									  ha sido creado con exito, favor ingrese al siguiente link 
									  para acceder a su portal web: ");

        $this->datos_usuario  = array("Usuario: " 		. $nombre_usuario.
                                      "Contasena: "		. $password_temporal.
                                      "Link de acceso: ". $link_acceso);
        return ($this);
    }
    //rln= Representante Legal Niño
    public function info_usuario_rln($nombre_usuario,$usuario,$niño,$unidad_educativa,$n_contrato,$password_temporal,$link_acceso){
        $this->modelo_mensaje = array("Sr. " . $usuario."Representate legal del niño".$niño.
                                      "Responsable de proveer el servicio de transporte escolar
                                      \n\n Reciba un coordial saludo de Antawa Go SA, empresa contratada
                                      por la Unidad Educativa " . $unidad_educativa.
                                      "; mediante el contrato " .$n_contrato.
                                      ";nuestra empresa busca darle tranquilidad y seguridad en el trayecto 
                                      de su hijo hacia la unidad educativa y su retorno a casa, de ser el caso.
									  \n\n Favor ingresar al siguiente link para completar la informacion 
									   correspondiente para generar la ruta respectiva: ");

        $this->datos_usuario  = array("Usuario: " 		. $nombre_usuario.
                                      "Contasena: "		. $password_temporal.
                                      "Link de acceso: ". $link_acceso);
        return ($this);
    }
}
?>