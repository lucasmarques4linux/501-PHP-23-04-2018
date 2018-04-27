<?php 

namespace Controller;

use Lib\ViewModel\ViewModel;
use Model\User;

class UserController
{
	private $viewModel;

	public function __construct()
	{
		$this->viewModel = new ViewModel();
	}
	public function index()
	{
		$users = User::all();
		$this->viewModel->render('user/index',['users' => $users]);
	}
	public function new(){}
	public function edit(){}
	public function create()
	{
		print_r($_POST);
	}
}