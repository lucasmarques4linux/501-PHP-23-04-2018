<?php 

class Db
{
	private $user;
	private $pass;
	private $dsn;
	private $pdo;
	private $isConnected = false;

	public function __construct($dsn,$user,$pass)
	{
		$this->dsn 	= $dsn;
		$this->user = $user;
		$this->pass = $pass;
	}

	private function doConnect()
	{
		if (!$this->isConnected) {
			$this->pdo = new PDO($this->dsn,$this->user,$this->pass);
			$this->isConnected = true;
		}
	}

	public function exec(string $query, array $args = array())
	{
		$this->doConnect();
		$stmt = $this->pdo->prepare($query);
		$stmt->execute($args);
		return $stmt->rowCount();
	}

	public function query(string $query)
	{
		$this->doConnect();
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

		return $db;
	}
}


$factory = new DbFactory();
$db = $factory->create();
var_dump($db);
$users = $db->query("SELECT * FROM users");
var_dump($db);
print_r($users);