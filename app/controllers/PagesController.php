<?php

namespace App\Controllers;

use \App\Core\{App, Request};

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

  public function searchNowPlaying()
  {
    $query = Request::query();

    $complex = App::get('database')->filter('complex', [
      'city'=>$query['city'],
      'name'=>$query['complex']
    ]);

    $now_playing = App::get('database')->filter('now_playing', ['complex'=>$complex[0]->id]);
    $movies_now_playing = [];

    foreach($now_playing as $np)
    {
      $movies_now_playing[] = App::get('database')->get('movie', ['id'=>$np->movie]);
    }

    echo App::get('twig')->render('now_playing.html', [
      'complex'=>$complex[0],
      'movies_now_playing'=>$movies_now_playing,
      'loggedin'=>isset($_SESSION['user']),
      'user'=>$_SESSION['user']
    ]);
  }

  public function viewShowtimes()
  {
    $query = Request::query();
    //complex, movie ids
    $sql = "SELECT * FROM (
            (SELECT * FROM theatre WHERE complex = :complex) AS T
            INNER JOIN
            (SELECT * FROM showtime WHERE movie = :movie) AS S
            )";

    $params = ['complex'=>$query['complex'], 'movie'=>$query['movie']];

    $showtimes = App::get('database')->raw($sql, $params);
    $complex = App::get('database')->get('complex', ['id'=>$query['complex']]);
    $movie = App::get('database')->get('movie', ['id'=>$query['movie']]);

    $loggedin = isset($_SESSION['user']);
    $user = $_SESSION['user'];

    echo App::get('twig')->render(
      'view_showtimes.html',
      compact('showtimes', 'complex', 'movie', 'loggedin', 'user'
    ));
  }

  public function bookShowtime()
  {
    //if not logged in, send away
    $loggedin = isset($_SESSION['user']);
    if(! $loggedin)
    {
      return redirect('');
    }
    $user = $_SESSION['user'];
    //if showtime has no seats left, send away
    $showtime_id = Request::query()['showtime'];
    $showtime = App::get('database')->get('showtime', ['id'=>$showtime_id]);
    $showtime->movie = App::get('database')->get('movie', ['id'=>$showtime->movie]);
    $showtime->theatre = App::get('database')->get('theatre', ['id'=>$showtime->theatre]);
    $showtime->theatre->complex = App::get('database')->get('complex', ['id'=>$showtime->theatre->complex]);

    if((int)$showtime->seats_left < 1)
    {
      return redirect('');
    }

    echo App::get('twig')->render(
      'booking_confirmation.html',
      compact('user', 'loggedin', 'showtime')
    );
  }

  public function browseMovies()
  {
    $now_playing = App::get('database')->raw(
      'select * from now_playing group by movie'
    );

    $all_movies = App::get('database')->selectAll('movie');

    $movies_now_playing = [];

    foreach($now_playing as $np)
    {
      $movies_now_playing[] = App::get('database')->get('movie', ['id'=>$np->movie]);
    }

    echo App::get('twig')->render('browse_movies.html', [
      'movies_now_playing'=>$movies_now_playing,
      'all_movies'=>$all_movies,
      'loggedin'=>isset($_SESSION['user']),
      'user'=>$_SESSION['user']
    ]);
  }
}
