<?php

namespace App\Controllers;

class PagesController
{
  public function home()
  {
    return render('index');
  }

  public function about()
  {
    $companyName = 'TOPKEK';

    return render('about', compact('companyName'));
  }

  public function contact()
  {
    return render('contact');
  }


}
