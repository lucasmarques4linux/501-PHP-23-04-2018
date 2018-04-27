<?php 

require '../config/config.php';
require '../autoload.php';

use Lib\FrontController\FrontController;

(new FrontController())->run();