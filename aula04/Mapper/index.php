<?php 

require 'autoload.php';

use Entity\User;
$mapper = new Mapper\UserMapper();

echo '<pre>';
// Instancia da Entidade User;
$lucas = new User();
$lucas->setName('Lucas M');
$lucas->setEmail('lucascm@gmail.com');
$lucas->setPass('123');

// Mapper vai receber a instancia e salvar no banco
// $mapper->create($lucas);


// Mapper retornar uma instancia de User
$lucas = $mapper->findOne(51);
print_r($lucas);
echo '<hr>';


// Mapper vai receber a instancia e salvar no banco
$lucas->setName('Lucas C Marques');
$lucas->setPass('123');
$mapper->edit($lucas);

$lucas = $mapper->findOne(51);
$pass = '123';

if (password_verify($pass,$lucas->getPass())) {
	echo 'ok';
}
echo '<hr>';

// Mapper lista de Users
print_r($mapper->findAll());