<?php 

namespace Model;

use TableGateway\TableGateway;

class User
{
	private $id;
	private $name;
	private $email;
	private $pass;

	public function __construct(string $name,string $email, string $pass,int $id = null)
	{
		$this->name = $name;
		$this->email = $email;
		$this->pass = $pass;
		$this->id = $id;
	}

	public function getName()
	{
	    return $this->name;
	}
	public function setName($name)
	{
	    $this->name = $name;
	}
	public function getEmail()
	{
	    return $this->email;
	}
	public function setEmail($email)
	{
	    $this->email = $email;
	}
	public function getPass()
	{
	    return $this->pass;
	}
	public function setPass($pass)
	{
	    $this->pass = $pass;
	}
	public function getId()
	{
	    return $this->id;
	}
	public function setId($id)
	{
	    $this->id = $id;
	}

	public function __toString()
	{
		return 'Id:' . $this->id . 'Name: ' . $this->name . ' Email: ' . $this->email;
	}

	public function save()
	{
		$table = new TableGateway('users');
		$arr = ['name' => $this->name,'email'=> $this->email,'pass' => $this->pass];
		if (!$this->id) {
			$table->insert($arr);
		} else {
			$table->update($arr,'id='.$this->id);
		}
	}
	public static function find(int $id)
	{	
		$table = new TableGateway('users');
		$data = $table->find('*','id='.$id);
		$user = new User($data['name'],$data['email'],$data['pass'],$data['id']);
		return $user;
	}
	public static function all()
	{
		$table = new TableGateway('users');
		$arr = $table->findAll();
		$collection = array();
		foreach ($arr as $user) {
			$collection[] = new User($user['name'],$user['email'],$user['pass'],$user['id']);
		}
		return $collection;
	}
}
