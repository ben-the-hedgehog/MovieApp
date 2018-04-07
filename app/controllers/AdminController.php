<?php

namespace App\Controllers;

use \App\Core\{App, Request};

class AdminController
{
  //get
  public function home()
  {
    redirectIfNotAdmin('');

    $user = $_SESSION['user'];
    $loggedin = 1;

    $all_users = App::get('database')->selectAll('user');
    $all_complexes = App::get('database')->selectAll('complex');
    $all_movies = App::get('database')->selectAll('movie');

    echo App::get('twig')->render(
      'admin_home.html',
      compact('user', 'loggedin', 'all_users', 'all_complexes', 'all_movies')
    );
  }

  //post
  public function removeItem()
  {
    $is_admin = redirectIfNotAdmin('');
    $user = $_SESSION['user'];
    $target_id = $_POST['target_id'];
    $target_id_name = $_POST['target_id_name'];
    $target_item = $_POST['target_item'];

    App::get('database')->delete($target_item, [$target_id_name=>$target_id]);

    redirect('admin/home');
  }
}
