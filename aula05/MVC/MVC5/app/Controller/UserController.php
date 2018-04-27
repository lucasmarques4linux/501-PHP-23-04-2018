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
	public function new()
	{
		$this->viewModel->render('user/new');
	}
	public function edit($id)
	{
		$user = User::find($id);
		$this->viewModel->render('user/edit',['user'=>$user]);
	}
	public function create()
	{
		$user = new User($_POST['name'],$_POST['email'],$_POST['pass']);
		$user->save();
		header('location:?r=user');
	}
}