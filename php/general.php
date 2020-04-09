<?php
    require_once "./composer/vendor/autoload.php";
    use NNV\RestCountries;
    class MySingleton
    {
        private static $restCountries;
        //private static $instance;
        //private $counter;

        private function __construct()
        {
            echo 'Contruyendo objeto..'.PHP_EOL;
        }

        public static function getInstance()
        {
            if (!self::$restCountries instanceof self) {
                self::$restCountries = new RestCountries;
            }

            return self::$restCountries;
        }
    }
?>
