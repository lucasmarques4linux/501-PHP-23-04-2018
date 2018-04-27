<?php 

namespace Model;

use Model\Mapper\UserMapper;
use Model\Entity;

class UserModel
{
	private $userMapper;

	public function __construct()
	{
		$this->userMapper = new UserMapper();
	}

	public function create(User $user)
	{
		$arr = [
			'name' => $user->getName(),
			'email' => $user->getEmail(), 
			'pass' => $user->getPass()
			];
		$this->userMapper->insert($arr);
	}

	public function edit(User $user)
	{
		$arr = [
			'name' => $user->getName(),
			'email' => $user->getEmail(), 
			'pass' => $user->getPass()
			];
		$id = 'id='.$user->getId();
		$this->userMapper->update($arr,$id);
	}

	public function findOne(int $id)
	{
		return $this->userMapper->find('*','id='.$id);
	}
}