<?php 

// Um único usuario
class User
{
	public $name;

	public function __construct(string $name)
	{
		$this->name = $name;
	}
}

// Coleção de usuarios
class Users implements Iterator,ArrayAccess, Countable, SeekableIterator
{
	private $users = [];
	private $index = 0;

	public function offsetExists($offset)
	{
		return isset($this->users[$offset]);
	}
	public function offsetGet ($offset) 
	{
		return $this->users[$offset];
	}
	public function offsetSet ($offset ,$value )
	{
		if (empty($offset)) {
			$this->users[] = $value;
		} else {
			$this->users[$offset] = $value;
		}
	}
	public function offsetUnset ($offset )
	{
		unset($this->users[$offset]);
	}
	public function count()
	{
		return count($this->users);
	}
	public function current()
	{
		return $this->users[$this->index];
	}
	public function next()
	{
		$this->index++;
	}
	public function key()
	{
		return $this->index;
	}
	public function valid()
	{
		return isset($this->users[$this->key()]);
	}
	public function rewind()
	{
		$this->index = 0;
	}

	public function seek($position)
	{
		if (isset($this->users[$position])) {
			return $this->users[$position];
		}
	}
}

$collectionUsers = new Users();
$collectionUsers[] = new User('Lucas');
$collectionUsers[] = new User('4Linux');
$collectionUsers[] = new User('José');
$collectionUsers[] = new User('Maria');

echo '<pre>';
// print_r($collectionUsers);
print_r($collectionUsers[1]);
foreach ($collectionUsers as $user) {
	echo $user->name . '<br>';
}
echo count($collectionUsers);