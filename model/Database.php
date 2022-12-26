<?php 

class Database{

        public static $connection = NULL;
    
        private function __construct(){
            echo 'connected';
        }
    
        public static function getInstance()
        {
            if(self::$connection == NULL):
                self::$connection = new mysqli('localhost', 'root', '', 'photo');
            endif;
    
            return self::$connection;
        }
}

$database =  Database::getInstance();

?>