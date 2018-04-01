<?php

namespace App\Controllers;

use \App\Core\App;

class PagesController
{
  public function home()
  {
    $loggedin = isset($_SESSION['user']);
    $user = $_SESSION['user'];

    echo App::get('twig')->render('index.html', compact('user', 'loggedin'));
  }

  public function createAccount()
  {
    echo App::get('twig')->render('create_user.html');
  }
}
