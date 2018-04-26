<?php 

class Db
{
	private $user;
	private $pass;
	private $dsn;
	private $pdo;

	public function __construct($dsn,$user,$pass)
	{
		$this->dsn 	= $dsn;
		$this->user = $user;
		$this->pass = $pass;
	}

	public function connect()
	{
		$this->pdo = new PDO($this->dsn,$this->user,$this->pass);
	}

	public function exec(string $query, array $args = array())
	{
		$stmt = $this->pdo->prepare($query);
		$stmt->execute($args);
		return $stmt->rowCount();
	}

	public function query(string $query)
	{
		$stmt = $this->pdo->query($query);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}

class DbFactory
{
	public function create()
	{
		$config = include 'config.php';

		$db = new Db($config['dsn'],$config['user'],$config['pass']);
		$db->connect();
		return $db;
	}
}


$factory = new DbFactory();
$db = $factory->create();
$users = $db->query("SELECT * FROM users");
print_r($users);