<?php 

require 'autoload.php';


// Instancia da Entidade Users;

// Mapper vai receber a instancia e salvar no banco

// Mapper retornar uma instancia de User

// Mapper vai receber a instancia e salvar no banco

// Mapper lista de Users

$mapper = new Mapper\UsersMapper();

print_r($mapper->findAll());