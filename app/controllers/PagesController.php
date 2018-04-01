<?php

namespace App\Controllers;

use \App\Core\App;

class PagesController
{
  public function home()
  {
    $user = $_SESSION['user'];
    $loggedin = $_SESSION['loggedin'];

    echo App::get('twig')->render('index.html', compact('user', 'loggedin'));
  }
  
}
