<?php

namespace App\Controllers;

use \App\Core\{App, Request};

class BookingController
{
  public function addBooking()
  {
    //if not loggedin, send away
    $loggedin = isset($_SESSION['user']);
    if(! $loggedin)
    {
      return redirect('');
    }
    $user = $_SESSION['user']->account_no;

    $showing = $_POST['showtime'];
    $num_seats = $_POST['num_seats'];

    App::get('database')->insert('reserves', compact('user', 'showing', "num_seats"));

    redirect('');
  }
}
