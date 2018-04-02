<?php

namespace App\Core;

use \Exception;

class App
{
  protected static $registry = [];

  public static function bind($key, $val)
  {
    static::$registry[$key] = $val;

  }

  public static function get($key)
  {
    if(! array_key_exists($key, static::$registry))
    {
        throw new Exception("No $key exists in the App container!");
    }
    return static::$registry[$key];
  }

}
