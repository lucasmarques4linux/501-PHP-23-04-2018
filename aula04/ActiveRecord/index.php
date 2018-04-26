<?php 

require 'autoload.php';

$lucas = new User('Lucas','lucas@gmail.com', md5('123'));

$lucas->save();

$id = 3;
$lucas = User::find($id);

$lucas->nome = "Lucas Marques";
$lucas->save();

print_r(User::all());