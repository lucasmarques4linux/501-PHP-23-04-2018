<?php 

require 'autoload.php';

use Model\User;
echo '<pre>';

$lucas = new User('Lucas','lucas@gmail.com', md5('123'));

$lucas->save();

echo $lucas;
echo "<hr>";

$id = 3;
$lucas = User::find($id);

print_r($lucas);
echo "<hr>";
$lucas->setName("Lucas Marques");
$lucas->save();

print_r(User::all());