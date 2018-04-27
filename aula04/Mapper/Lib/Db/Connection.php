<?php 

namespace Lib\Db;

use PDO;

class Connection
{
	private static $instance = null;

	private function __construct(){}
	private function __clone(){}

	public static function getInstance()
	{
		if (!self::$instance) {
			self::$instance = new PDO('pgsql:host=localhost;dbname=aula','lucas','123');
			// self::$instance = new PDO('mysql:host=localhost;dbname=aula','lucas','@da4linux');

			self::$instance->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		}

		return self::$instance;
	}
}