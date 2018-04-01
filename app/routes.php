<?php

$router->get('', "PagesController@home");
$router->get('login', 'LoginController@login');
$router->post('login', 'LoginController@login');
$router->post('logout', 'LoginController@logout');
