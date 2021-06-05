<?php

require_once './core/View.php';

if(!isset($_SESSION)){
    session_start();
}

class App extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function home() {
        if($this->session()) {
            $this->view->render('admin/home');
        } else {
            $this->redirect("admin/login");
        }
    }
}