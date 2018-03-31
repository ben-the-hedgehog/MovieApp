<?php
  #require 'Task.php';
  use \App\Core\{Router, Request};
  require __DIR__.'/vendor/autoload.php';
  require 'core/bootstrap.php';

  Router::load('app/routes.php')->direct(Request::uri(), Request::method());
