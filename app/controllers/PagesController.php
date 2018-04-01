<?php

namespace App\Controllers;

use \App\Core\App;

class PagesController
{
  public function home()
  {
    echo App::get('twig')->render('index.tmpl.php');
  }

  public function about()
  {
    $companyName = 'TOPKEK';

    echo App::get('twig')->render('about', compact('companyName'));
  }

  public function contact()
  {
    echo App::get('twig')->render('contact');
  }


}
