<?php

namespace Core;

class View
{
  public static function render($view, $params = [])
  {
    foreach ($params as $key => $value) {
      $$key = $value;
    }
    require_once 'views/pages/' . $view . '.php';
  }
}
