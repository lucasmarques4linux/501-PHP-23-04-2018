<?php 

namespace Mapper;

use Lib\TableGateway\TableGateway;
use Entity\User;

class UserMapper extends TableGateway
{
	protected $entity = 'Entity\User';
	protected $table  = 'users';

	public function create(User $user)
	{
		$arr = [
			'name' => $user->getName(),
			'email' => $user->getEmail(), 
			'pass' => $user->getPass()
			];
		$this->insert($arr);
	}

	public function edit(User $user)
	{
		$arr = [
			'name' => $user->getName(),
			'email' => $user->getEmail(), 
			'pass' => $user->getPass()
			];
		$id = 'id='.$user->getId();
		$this->update($arr,$id);
	}

	public function findOne(int $id)
	{
		return $this->find('*','id='.$id);
	}
}