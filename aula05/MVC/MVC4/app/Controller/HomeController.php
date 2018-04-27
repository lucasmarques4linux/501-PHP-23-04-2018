<?php 

namespace Controller;

class HomeController
{
	public function index($id)
	{
		echo 'Olá FrontController - sou o HomeController - ID ' . $id;
	}
}