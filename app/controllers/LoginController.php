<?php
namespace App\Controllers;

use \App\Core\{Request, App};

class LoginController
{
  public function login()
  {
    if(Request::method() === 'POST')
    {
      
    }
    else
    {
      echo App::get('twig')->render('login.html');
    }
  }
}
