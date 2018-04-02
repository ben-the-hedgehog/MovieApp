<?php

use App\Core\App;
use App\Core\Database\{QueryBuilder, Connection};

# Binding global app variables to the App DI container
App::bind('tmpl_dir', $_SERVER['DOCUMENT_ROOT'].'/app/templates');

App::bind('config', require 'config.php');

App::bind('database', new QueryBuilder(
  Connection::make(
    App::get('config')['database']
  )
));

# Twig setup
$loader = new Twig_Loader_Filesystem('app/templates/');
App::bind('twig', new Twig_Environment($loader));

# Helper Functions

function formatConditional($conditions, $separator)
{
    $conditionString = '';
    foreach(array_keys($conditions) as $key) {
        $conditionString = $conditionString . " $separator " . $key . '= :' . $key;
    }

    return preg_replace("/^ $separator /", '', $conditionString);
}

function redirect($path)
{
    header("Location: /{$path}");
}

function redirectIfNotLoggedin($path)
{
    //if not loggedin, send away
    $loggedin = isset($_SESSION['user']);
    if(! $loggedin)
    {
      return redirect($path);
    }
    return $loggedin;
}

function dd($var)
{
  die(var_dump($var));
}
