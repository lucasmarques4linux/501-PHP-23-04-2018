<?php 

$routes = [];

$routes['home'] = 'HomeController@Index';

$routes['user'] = 'UserController@Index';
$routes['user/new'] = 'UserController@New';
$routes['user/create'] = 'UserController@Create';
$routes['user/edit/{id}'] = 'UserController@Edit';

// return $routes;