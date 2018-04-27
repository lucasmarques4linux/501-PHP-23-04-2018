<?php 

$routes = [];

$routes['home'] = 'HomeController@Index';

$routes['user'] = 'UserController@Index';
$routes['user/new'] = 'UserController@New';
$routes['user/create'] = 'UserController@Create';
$routes['user/edit/{id}'] = 'UserController@Edit';
$routes['user/update'] = 'UserController@Update';
$routes['user/delete'] = 'UserController@Delete';

// return $routes;