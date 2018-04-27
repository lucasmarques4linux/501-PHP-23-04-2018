<?php 

namespace Controller;

use Lib\ViewModel\ViewModel;
use Model\UserModel;
use Model\Entity\User;

class UserController
{
	private $viewModel;
	private $userModel;

	public function __construct()
	{
		$this->viewModel = new ViewModel();
		$this->userModel = new UserModel();
	}
	public function index()
	{
		$users = $this->userModel->all();
		$this->viewModel->render('user/index',['users' => $users]);
	}
	public function new()
	{
		$this->viewModel->render('user/new');
	}
	public function edit($id)
	{	
		$user = $this->userModel->findOne($id);
		$this->viewModel->render('user/edit',['user'=>$user]);
	}
	public function create()
	{
		$this->userModel->create($_POST);
		header('location:?r=user');
	}
}