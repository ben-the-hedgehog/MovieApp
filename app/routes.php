<?php

$router->get('', "PagesController@home");
$router->get('login', 'UserController@login');
$router->post('login', 'UserController@login');
$router->post('logout', 'UserController@logout');
$router->get('user/create', 'PagesController@createAccount');
$router->post('user/create', 'UserController@createAccount');
$router->get('showtimes/search', 'PagesController@searchNowPlaying');
