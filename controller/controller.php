<?php

class Controller {
    
    protected $view;

    public function __construct() {
        $this->view = new View();
    }

    public function session() {
        if(isset($_SESSION) || isset($_SESSION["nombre"]) || isset($_SESSION["apellido"])) {
            return true;
        }
        return false;
    }

    public function redirect(string $url) {
        header("location:". Config::$BASE_URL. $url);
    }

}