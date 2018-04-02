<?php
namespace App\Controllers;

use \App\Core\{Request, App};
use \App\Core\Session\LoginSession;

class UserController
{
  public function login()
  {
    if(Request::method() === 'POST')
    {
      $email = $_POST['email'];
      $password = $_POST['password'];

      $user = App::get('database')->get('user', compact('email', 'password'));
      if( $user == FALSE )
      {
        return redirect('login');
      }

      $_SESSION['user'] = $user;

      return redirect('');
    }
    else
    {
      echo App::get('twig')->render('login.html');
    }
  }

  public function logout()
  {
    $_SESSION['user'] = NULL;
    redirect('');
  }

  public function createAccount()
  {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $fname = htmlspecialchars($_POST['fname']);
    $lname = htmlspecialchars($_POST['lname']);
    $is_admin = 0;
    $cc_number = htmlspecialchars($_POST['cc_number']);
    $cc_expiry = htmlspecialchars($_POST['cc_expiry']);
    if(App::get('database')->filter('user', compact('email')) !== [])
    {
      return redirect('user/create');
    }
    App::get('database')->insert('user', compact(
      'password', 'fname', 'lname', 'is_admin', 'email', 'cc_number', 'cc_expiry'
    ));

    return redirect('');
  }
}
