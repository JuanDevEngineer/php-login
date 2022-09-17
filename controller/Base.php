<?php

namespace Controllers;

use Config\Config;

if (!isset($_SESSION)) {
  session_start();
}

class Base
{
  public static function session()
  {
    return (isset($_SESSION) && isset($_SESSION["nombre"]) && isset($_SESSION["apellido"]));
  }

  public static function redirect(string $url)
  {
    header("location:" . 'http://localhost/test' . $url);
  }
}
