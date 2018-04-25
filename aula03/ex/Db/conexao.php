<?php 

class Conection
{
	private static $instance = null;

	private function __construct(){}
	private function __clone(){}

	public static function getInstance(string $db = 'mysql')
	{
		if ($db == 'mysql') {
			$dsn = "mysql:host=localhost;dbname=aula";
			$user = "lucas";
			$pass = "@da4linux";
		}
		if ($db == 'postgres') {
			$dsn = "pgsql:host=localhost;dbname=aula";
			$user = "lucas";
			$pass = "123";
		}

		if (!self::$instance) {
			self::$instance = new PDO($dsn,$user,$pass);

			self::$instance->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		}

		return self::$instance;

	}
}
