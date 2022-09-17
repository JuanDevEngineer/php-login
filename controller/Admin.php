<?php

namespace Controllers;

use Core\View;
use Models\User;
use Services\UserServiceImpl;

if (!isset($_SESSION)) {
  session_start();
}

class Admin
{
  protected $userService;

  public function __construct()
  {
    $this->userService = new UserServiceImpl();
  }

  public static function loginView()
  {
    if (!Base::session()) {
      return  View::render('login');
    } else {
      return Base::redirect('/admin/home');
    }
  }

  public static function registerView()
  {
    if (!Base::session()) {
      return View::render('register');
    } else {
      return Base::redirect('/admin/home');
    }
  }

  public static function adminView()
  {
    if (Base::session()) {
      return View::render('admin/home');
    } else {
      return Base::redirect('/login');
    }
  }

  public function signIn()
  {
    if (isset($_POST) && $_SERVER['REQUEST_METHOD'] === 'POST') {
      // obtenemos las variables
      $nombre = strtolower(trim($_POST["nombre"]));
      $apellido = strtolower(trim($_POST["apellido"]));

      // llamanos el metodo del Modelo
      $response = $this->userService->login($nombre, $apellido);

      // asignamos las sessiones
      if ($response["status"] == "success") {
        $_SESSION["nombre"] = $response["data"]["nombre"];
        $_SESSION["apellido"] = $response["data"]["apellido"];
      }

      echo json_encode($response);
    }
  }

  public function signUp()
  {
    if (isset($_POST) && $_SERVER['REQUEST_METHOD'] === 'POST') {
      $nombre = strtolower(trim($_POST["nombre"]));
      $apellido = strtolower(trim($_POST["apellido"]));
      $password = strtolower(trim($_POST["password"]));
      $response = $this->userService->register(new User($nombre, $apellido, $password));
      echo json_encode($response);
    }
  }

  public function logout()
  {
    if (isset($_SESSION["nombre"]) && isset($_SESSION["apellido"])) {
      unset($_SESSION["nombre"]);
      unset($_SESSION["apellido"]);
      Base::redirect('/login');
    }
  }
}
