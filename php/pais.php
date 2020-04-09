<?php
   include "./php/IMetodos.php";
   include_once "general.php";
   
class Pais extends Continente implements IMetodos
{
   private $pais;
   
   public $capital;

   public function __construct($pais){
      parent::__construct();
      $this->pais = $pais;
   }
   public function setCapital($dato){
      $this->capital = $dato;
  }
  public function obtenerPaisPorCapital(){
      echo(json_encode($this->restCountries->fields(["name"])->byCapitalCity($this->capital))); 
   }
   
   
   public function Mostrar(){
      echo json_encode($this->restCountries->byName($this->pais));     
   }
}


    

 ?>