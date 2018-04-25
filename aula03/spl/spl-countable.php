<?php 

class Users implements ArrayAccess, Countable
{
	private $usersIn = [];

	public function offsetExists($offset)
	{
		return isset($this->usersIn[$offset]);
	}
	public function offsetGet ($offset) 
	{
		return $this->usersIn[$offset];
	}
	public function offsetSet ($offset ,$value )
	{
		if (empty($offset)) {
			$this->usersIn[] = $value;
		} else {
			$this->usersIn[$offset] = $value;
		}
	}
	public function offsetUnset ($offset )
	{
		unset($this->usersIn[$offset]);
	}
	public function count()
	{
		return count($this->usersIn);
	}
}
echo '<pre>';
$users = new Users;
$users['nome'] = '4Linux';
$users[] = '4linux.com.br';
var_dump(isset($users['nome']));
echo '<br>';
echo $users['nome'];
echo '<br>';
print_r($users);
echo '<br>';

echo count($users);