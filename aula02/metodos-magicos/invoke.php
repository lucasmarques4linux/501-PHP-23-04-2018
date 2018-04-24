<?php 


class Pessoa
{
	public function __invoke($valor)
	{
		echo 'Parametro: ' . $valor;
	}
}

$pessoa = new Pessoa();
$pessoa('Lucas');