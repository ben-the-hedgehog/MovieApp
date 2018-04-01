<?php

class Authenticator
{
  public static function isLoggedIn()
  {
    return ($_SESSION['loggedin'] == 1);
  }

  public static function isAdmin(){

  }

  
}
