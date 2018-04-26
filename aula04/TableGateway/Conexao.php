<?php 

class Conexao
{
	private static $instance = null;

	private function __construct(){}
	private function __clone(){}

	public static function getInstance()
	{
		if (!self::$instance) {
			self::$instance = new PDO('pgsql:host=localhost;dbname=aula','lucas','123');
		}

		return self::$instance;
	}
}