<?php 

require_once 'view.php';
require_once 'model.php';
require_once 'controller.php';

use Model\Aluno as ModelAluno;
use View\Aluno as ViewAluno;
use Controller\Aluno as ControllerAluno;

$aluno = new ViewAluno();
var_dump($aluno);