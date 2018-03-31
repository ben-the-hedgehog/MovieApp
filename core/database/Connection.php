<?php

namespace App\Core\Database;

use \PDO;

class Connection{

  # creates a connection to the db, returns pdo instance
  public static function make($config){
    try{
      $pdo = new PDO(
        $config['connection'].';dbname='.$config['name'],
        $config['username'],
        $config['password'],
        $config['options']
      );
    } catch (PDOException $e) {
        die($e->getMessage());
    }
    return $pdo;
  }

}
