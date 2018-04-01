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

function formatConditional($conditions)
{
    $conditionString = '';
    foreach(array_keys($conditions) as $key) {
        $conditionString = $conditionString . ' and ' . $key . '= :' . $key;
    }

    return preg_replace('/^ and /', '', $conditionString);
}

function redirect($path)
{
    header("Location: /{$path}");
}

function dd($var)
{
  die(var_dump($var));
}
