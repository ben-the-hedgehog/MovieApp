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
      'movies_now_playing'=>$movies_now_playing
    ]);
  }

  public function viewShowtimes()
  {
    $query = Request::query();
    //complex, movie ids
    $sql = "SELECT * FROM (
            (SELECT * FROM theatre WHERE complex = :complex) AS T
            INNER JOIN
            (SELECT * FROM showing WHERE movie = :movie) AS S
            )";

    $params = ['complex'=>$query['complex'], 'movie'=>$query['movie']];
    $showtimes = App::get('database')->raw($sql, $params);
    dd($showtimes);
  }
}
