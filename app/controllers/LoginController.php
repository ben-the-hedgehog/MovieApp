<?php
namespace App\Controllers;

use \App\Core\{Request, App};

class LoginController
{
  public function login()
  {
    if(Request::method() === 'POST')
    {
      $account_no = $_POST['account_no'];
      $password = $_POST['password'];

      $user = App::get('database')->filter('user', compact('account_no', 'password'));
      if( $user === [] )
      {
        return redirect('login');
      }

      $_SESSION['user'] = $user;
      $_SESSION['loggedin'] = True;
      
      return redirect('');
    }
    else
    {
      echo App::get('twig')->render('login.html');
    }
  }
}
