<?php

namespace App\Core;

class Request{

  public static function uri(){
    return trim( parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
  }

  public static function query(){
    $query = [];
    parse_str(parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY), $query);
    return $query;
  }

  public static function method(){
    return $_SERVER['REQUEST_METHOD'];
  }
}
