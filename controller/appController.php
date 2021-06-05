<?php

require_once './core/View.php';

require_once 'controller.php';

if(!isset($_SESSION)){
    session_start();
}

class App {

    protected $view;

    public function __construct() {
        $this->view = new View();
    }

    public function home() {
        if(Controller::session()) {
            $this->view->render('admin/home');
        } else {
            Controller::redirect("admin/login");
        }
    }
}