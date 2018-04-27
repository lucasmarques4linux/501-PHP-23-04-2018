<?php 

require '../config/config.php';
require '../autoload.php';

use Lib\FrontController\FrontController;

(new FrontController())->run();

// user - Lista Usuarios
// user/edit/10 -> Exibir dados do Usuario de ID 10
// user/new - Formulário para cadastro de Usuario
// user/create - Receber os dados do formulario e cadastrar o usuario
