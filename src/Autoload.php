<?php

	$mes 	= array('','Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic');
	$mesM 	= array('','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');

    function __autoload($class_name) 
    {
        //Clase de directorios
        $directorios = array(
			'../../../../class/libs/class.',
			'../../../class/libs/class.',
			'../../class/libs/class.',
            '../class/libs/class.',
            'class/libs/class.',
			'../../../../class/persistencia/class.',
			'../../../class/persistencia/class.',
			'../../class/persistencia/class.',
            '../class/persistencia/class.',
            'class/persistencia/class.',
			'../../../../class/bdd/class.',
			'../../../class/bdd/class.',
			'../../class/bdd/class.',
			'../class/bdd/class.',	
            'class/bdd/class.',''
        );
		        
        //Itera todos los directorios
		
        foreach($directorios as $directorio){
            // Verifica si existe el archivo
			$path=$directorio.$class_name.'.php';
            if(file_exists($path)){
			    include_once($path);
                return;
            }          
        }
    } 
	
?>
