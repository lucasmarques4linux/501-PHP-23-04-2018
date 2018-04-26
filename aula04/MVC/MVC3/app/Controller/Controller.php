<?php 

namespace Controller;

use Model\User;
use View\View;

class Controller
{
	private $model;
	private $view;

	public function __construct()
	{
		// $this->model = new User;
		$this->view = new View;
	}

	public function run()
	{
		$users = User::all();
		$this->view->render('users',['users' => $users]);
	}
}