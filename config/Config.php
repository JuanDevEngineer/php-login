<?php

namespace Config;

class Config
{
  private static $base_url;

  function __construct()
  {
    self::$base_url = getenv('BASE_URL') ?? 'http://localhost/test';
  }

  public static function getBaseUrl()
  {
    return self::$base_url;
  }
}
