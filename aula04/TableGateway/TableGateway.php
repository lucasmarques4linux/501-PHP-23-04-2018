<?php 

require 'Conexao.php';

class TableGateway
{

	private $con;

	public function __construct()
	{
		$this->con = Conexao::getInstance();
	}

	public function insert(){}
	public function update(){}
	public function delete(){}
	public function find(){}
	public function findAll(){}
}