<?php 

namespace Familia;

class Pai
{
	const NOME = 'Lucas';
	protected static $nome = 'Classe Pai';
	public static function getNome()
	{
		echo __METHOD__ . '<br>';
		echo __CLASS__ . '<br>';
		echo __NAMESPACE__ . '<br>';
		echo __DIR__ . '<br>';
		echo Pai::NOME;
		// return static::$nome;
	}
}

class Filha extends Pai
{
	protected static $nome = 'Classe Filha';
}

echo '<pre>';
echo Filha::getNome();
// Pai::NOME = 'José';
// echo '<br>';
// echo Pai::getNome();
// echo '<br>';
// echo Pai::NOME;