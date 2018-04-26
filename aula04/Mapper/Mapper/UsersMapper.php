<?php 

namespace Mapper;

use Lib\TableGateway\TableGateway;

class UsersMapper extends TableGateway
{
	protected $entity = 'Entity\Users';
	protected $table  = 'users';

	// create(User) ->  insert()
	// update(User) ->  update()
}