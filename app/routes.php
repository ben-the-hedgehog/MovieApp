<?php

$router->get('', "PagesController@home");
$router->get('about', "PagesController@about");
$router->get('contact', "PagesController@contact");
// $router->post('names', 'PagesController@add_name');
$router->get('users', "UsersController@index");
$router->post('users', "UsersController@add_name");
$router->post('users/delete-name', "UsersController@delete_name");
