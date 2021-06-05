<?php

require_once './core/View.php';
require_once 'model/User.php';

session_start();

class admin extends Controller {

    protected $user;

    public function __construct() {
        parent::__construct();
        $this->user = new User();
    }

    public function login() {
        $this->view->render('login');
    }

    public function registrar() {
        $this->view->render('register');
    }

    public function signIn() {
        if (isset($_POST) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            // obtenemos las variables
            $nombre = strtolower(filter_var( $_POST["nombre"], FILTER_SANITIZE_STRING));
            $apellido = strtolower(filter_var( $_POST["apellido"], FILTER_SANITIZE_STRING));

            // llamanos el metodo del Modelo
            $response = $this->user->login($nombre, $apellido);
            
            // asignamos las sessiones
            if($response["status"] == "success") {
                $_SESSION["nombre"] = $response["data"]["nombre"];
                $_SESSION["apellido"] = $response["data"]["apellido"];
            }

            echo json_encode($response);
        }
    }

    public function signUp() {
        if (isset($_POST) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = strtolower(filter_var( $_POST["nombre"], FILTER_SANITIZE_STRING));
            $apellido = strtolower(filter_var( $_POST["apellido"], FILTER_SANITIZE_STRING));
            $password = strtolower(filter_var( $_POST["password"], FILTER_SANITIZE_STRING));
            $response = $this->user->registrar($nombre, $apellido, $password);
            echo json_encode($response);
        }
    }

    public function logout() {
        if(isset($_SESSION["nombre"]) && isset($_SESSION["apellido"])) {
            unset($_SESSION["nombre"]);
            unset($_SESSION["apellido"]);
            $this->redirect('admin/login');
        }
    }

}