<?php

class usuario{

    public $email;
    public $clave;
    public $tipo;

    function __construct($array){
        $this->email = $array[0];
        $this->clave = $array[1];
        $this->tipo = $array[2];
    }
    
    public static function Guardar($obj)
	{
		$resultado = FALSE;
		
		//ABRO EL ARCHIVO
		$ar = fopen("archivos/usuarios.txt", "a");
		
		//ESCRIBO EN EL ARCHIVO
		$cant = fwrite($ar, json_encode($obj));
		
		if($cant > 0)
		{
            $resultado = TRUE;	
            echo "Usuario guardado con exito";
		}
		//CIERRO EL ARCHIVO
		fclose($ar);
		
		return $resultado;
    }
    public static function ValidarUsuario($nombre,$clave){
    
            $ListaDeUsuarios = array();
    
            //leo todos los productos del archivo
            $archivo=fopen("archivos/usuarios.txt", "r");
            
            while(!feof($archivo))
            {
                $archAux = fgets($archivo);
                $productos = explode(" - ", $archAux);
                //http://www.w3schools.com/php/func_string_explode.asp
                $productos[0] = trim($productos[0]);
                if($productos[0] != ""){
                    $ListaDeUsuarios[] = new usuario(array($productos[0], $productos[1],$productos[2]));
                }
            }
            fclose($archivo);
 
            return $ListaDeUsuarios;
            
        
    }
}


?>