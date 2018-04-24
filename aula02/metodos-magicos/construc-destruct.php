<?php 


class Pessoa
{
	public function __construct()
	{
		echo '<p>Estou construindo um objeto</p>';
	}
	public function __destruct()
	{
		echo '<p>Estou destruindo um objeto</p>';
	}
}

$pessoa = new Pessoa();
unset($pessoa);
$pessoa = new Pessoa();