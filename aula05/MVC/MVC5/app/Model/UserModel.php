<?php 

namespace Model;

use Model\Mapper\UserMapper;
use Model\Entity\User;

class UserModel
{
	private $userMapper;

	public function __construct()
	{
		$this->userMapper = new UserMapper();
	}

	public function create(array $user)
	{
		var_dump($user);
		die();
		$this->userMapper->insert($user);
	}

	public function edit(array $user)
	{
		$id = 'id='.$user['id'];
		$this->userMapper->update($user,$id);
	}

	public function findOne(int $id)
	{
		return $this->userMapper->find('*','id='.$id);
	}

	public function all()
	{
		return $this->userMapper->findAll();
	}
}