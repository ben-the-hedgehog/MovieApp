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

    $showtime = $_POST['showtime'];
    $num_seats = $_POST['num_seats'];

    App::get('database')->insert('booking', compact('user', 'showtime', "num_seats"));

    redirect('');
  }

  public function viewBookings()
  {
    $loggedin = redirectIfNotLoggedin('');
    $user = $_SESSION['user'];

    //get all bookings by current user
    $bookings = App::get('database')->filter('booking', ['user'=>$user->account_no]);

    //traverse dependency tree, build object from relations. theoretically faster than joins
    foreach ($bookings as $booking) {
      $booking->showtime = App::get('database')->get('showtime', ['id'=>$booking->showtime]);
      $booking->showtime->theatre = App::get('database')->get('theatre', ['id'=>$booking->showtime->theatre]);
      $booking->showtime->movie = App::get('database')->get('movie', ['id'=>$booking->showtime->movie]);
      $booking->showtime->theatre->complex = App::get('database')->get('complex', ['id'=>$booking->showtime->theatre->complex]);
    }

    echo App::get('twig')->render('my_bookings.html', compact('loggedin', 'user', 'bookings'));
  }

  public function cancelBooking()
  {
    $loggedin = redirectIfNotLoggedin('');
    $user = $_SESSION['user'];
    $showtime_id = $_POST['booking_showtime'];

    App::get('database')->delete('booking', ['user'=>$user->account_no, 'showtime'=>$showtime_id]);
    redirect('bookings/mybookings');
  }
}
