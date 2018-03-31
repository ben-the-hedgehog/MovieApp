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

# Helper Functions
function render($name, $data=[])
{
    extract($data);

  return require App::get('tmpl_dir').'/'.$name.'.tmpl.php';
}

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
