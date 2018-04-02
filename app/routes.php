<?php

$router->get('', "PagesController@home");
$router->get('login', 'UserController@login');
$router->post('login', 'UserController@login');
$router->post('logout', 'UserController@logout');
$router->get('user/create', 'PagesController@createAccount');
$router->post('user/create', 'UserController@createAccount');
$router->get('movies/browse', 'PagesController@browseMovies');
$router->get('showtimes/search', 'PagesController@searchNowPlaying');
$router->get('showtimes/view', 'PagesController@viewShowtimes');
$router->get('showtimes/book', 'PagesController@bookShowtime');
$router->post('showtimes/book', 'BookingController@addBooking');
$router->get('bookings/mybookings', 'BookingController@viewBookings');
$router->post('bookings/cancel', 'BookingController@cancelBooking');
$router->get('user/profile', 'UserController@viewProfile');
$router->post('user/update', 'UserController@updateProfile');
