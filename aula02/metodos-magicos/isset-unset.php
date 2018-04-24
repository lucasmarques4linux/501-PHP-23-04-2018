<?php 

class Pessoa
{
	public function __isset($propriedade)
	{
		echo 'Não existe esta propriedade ' . $propriedade;
		return true;
	}

	public function __unset($propriedade)
	{
		echo 'Não existe esta propriedade ' . $propriedade . ' para destruir';
		return true;
	}
}

$pessoa = new Pessoa;
var_dump(isset($pessoa->nome));
unset($pessoa->nome);