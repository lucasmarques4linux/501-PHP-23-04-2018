<?php 

//Singleton

class Conexao
{
	private static $instance = null;

	private function __construct(){}
	private function __clone(){}

	public static function getInstance()
	{
		if (!self::$instance) {
			self::$instance = new DateTime();
		}

		return self::$instance;
	}
}
echo '<pre>';
// $conexao = new Conexao();
var_dump(Conexao::getInstance());
// var_dump(Conexao::getInstance());
// var_dump(Conexao::getInstance());
// var_dump(Conexao::getInstance());
// var_dump(Conexao::getInstance());