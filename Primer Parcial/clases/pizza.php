<?php
class pizza
{
//--------------------------------------------------------------------------------//
//--ATRIBUTOS
	private $tipo;
 	private $precio;
    private $stock;
    private $sabor;
    private $pathFoto;
//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//
//--CONSTRUCTOR
	public function __construct($array)
	{
		$this->tipo = $array[0];
        $this->precio = $array[1];
        $this->stock = $array[2];
        $this->sabor = $array[3];
		$this->pathFoto = $array[4];
	}
//--------------------------------------------------------------------------------//
//--------------------------------------------------------------------------------//
//--METODOS DE CLASE
	public static function Guardar($obj)
	{
		$resultado = FALSE;
		
		//ABRO EL ARCHIVO
		$ar = fopen("archivos/productos.txt", "a");
		
		//ESCRIBO EN EL ARCHIVO
		$cant = fwrite($ar, json_encode($obj));
		
		if($cant > 0)
		{
            $resultado = TRUE;	
            echo "Pizza guardada con exito"	;
		}
		//CIERRO EL ARCHIVO
		fclose($ar);
		
		return $resultado;
	}
	public static function TraerTodosLosProductos()
	{

		$ListaDeProductosLeidos = array();

		//leo todos los productos del archivo
		$archivo=fopen("archivos/productos.txt", "r");
		
		while(!feof($archivo))
		{
			$archAux = fgets($archivo);
			$productos = explode(" - ", $archAux);
			//http://www.w3schools.com/php/func_string_explode.asp
			$productos[0] = trim($productos[0]);
			if($productos[0] != ""){
				$ListaDeProductosLeidos[] = new pizza($productos[0], $productos[1],$productos[2],$productos[3],$productos[4]);
			}
		}
		fclose($archivo);
		return $ListaDeProductosLeidos;
		
	}
	
//--------------------------------------------------------------------------------//
}