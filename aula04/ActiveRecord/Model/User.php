<?php 

namespace Model;

use TableGateway\TableGateway;

class User
{
	private $table;
	
	public function __construct()
	{
		$this->table = new TableGateway('users');
	}
}
