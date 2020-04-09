<?php
    require_once "./composer/vendor/autoload.php";
    require "./php/continente.php";
    require "./php/pais.php";
    require "./php/subRegion.php";

    
    
    //obtengo paises por continente
    $continente = new Continente("americas");
    //$continente->obtenerTodaInformacionPorContinente();
    //$continente->obtenerPaises();
  
    //obtener paises por subregion South America
    $subregion = new SubRegion("South America");
    //$subregion->obtenerPaises();
    
    //obtener paises por idioma
    $continente->setLenguaje("English");
    //$continente->obtenerPaisePorLenguaje();
    
    //detalles completos del pais 
    $pais = new Pais("Argentina");
    //$pais->Mostrar();
    
    //obtener paises por capital
    $pais->setCapital("Buenos Aires");
    $pais->obtenerPaisPorCapital();
  
?>