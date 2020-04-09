<?php
    include_once "./php/IMetodos.php";
    include_once "general.php";
    
    class subRegion extends Continente implements IMetodos
    {
        private $subRegion;

        public function __construct($subRegion){
            parent::__construct();
            $this->subRegion = $subRegion;
        }

        public function obtenerPaises(){
            
            $todassubRegiones = $this->restCountries->fields(["subregion","name"])->all();
            echo "\n\n\nEsto son los paises segun la sub region ($this->subRegion)\n\n\n";
            foreach ($todassubRegiones as $key=> $value) {
                
                  if($value->{"subregion"} == $this->subRegion){
                    
                   echo($value->{"name"}."\n");
                }
            }
        }
        public function Mostrar(){
            echo json_encode($this->restCountries->fields(["subregion"])->all());
        }
    }
    
    
    


 ?>