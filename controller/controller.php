<?php
if(!isset($_SESSION)){
    session_start();
}

class Controller {
    
    public static function session() {
        if(isset($_SESSION) && isset($_SESSION["nombre"]) && isset($_SESSION["apellido"])) {
            return true;
        }
        return false;
    }

    public static function redirect(string $url) {
        header("location:". Config::$BASE_URL. $url);
    }

}