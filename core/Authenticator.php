<?php

class Authenticator
{
  public static function isLoggedIn()
  {
    return ($_SESSION['loggedin'] == 1);
  }

  public static function isAdmin(){

  }

  // public static function fetchUser($username, $password)
  // {
  //   $user = App::get('database')->filter('user', compact('username', 'password'));
  // }

}
