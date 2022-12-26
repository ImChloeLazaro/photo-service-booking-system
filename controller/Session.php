<?php 

    class Session{

        public function __construct()
        {
            if(!isset($_SESSION)){
                session_start();
            }
        }

        public function SetSession($key, $value){
            return $_SESSION[$key] = $value;
        }

        public function ShowSession($key){
            return $_SESSION[$key];
        }

        public function DeleteSession($key)
        {
            unset($_SESSION[$key]);
        }

        public function DestroySession()
        {
            session_unset();
            session_destroy();
        }
    }
    
    $session = new Session;

?>