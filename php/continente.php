 <?php
    include_once "general.php";
   
    class Continente
    {
        protected $restCountries;
        public $nombre;
        public $paises;
        
        public $subRegiones;
        public $lenguaje;

        public function __construct($continente=null){
            $this->restCountries = MySingleton::getInstance();
            $this->nombre = $continente;
        }
        public function setLenguaje($dato){
            $this->lenguaje = $dato;
        }
        
        public function obtenerPaisePorLenguaje(){
            $todosLosPaises = $this->restCountries->fields(["languages","name"])->all();
            echo "\n\n\nEstos son los paises por el lenguaje ($this->lenguaje)\n\n\n";
            foreach ($todosLosPaises as $key => $value) {
               foreach ($value->{"languages"} as $key2 => $value2) {
                    if($value2->{"name"}==$this->lenguaje){
                        echo($value->{"name"}."\n");
                    }   
               }
            }            
        }

        
        
        public function obtenerSubRegiones(){
            $this->subRegiones = $this->restCountries->fields(["subregion"])->byRegion($this->nombre);
            echo json_encode($this->subRegiones);
        }
        public function obtenerPaises(){
         $this->paises = $this->restCountries->fields(["name"])->byRegion($this->nombre);
         echo json_encode($this->paises);
        }

        public function obtenerTodaInformacionPorContinente(){
            echo json_encode($this->restCountries->byRegion($this->nombre));
        }


        

    }
    
    


 ?>