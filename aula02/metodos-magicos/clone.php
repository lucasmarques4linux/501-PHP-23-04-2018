<?php 

class Pessoa
{
	public $nome;

	public function __clone()
	{
		echo '<p>Estou sendo clonado</p>';
	}
}

echo '<pre>';
$pessoa1 = new Pessoa;
// $pessoa2 = $pessoa1;
$pessoa2 = clone $pessoa1;
$pessoa2->nome = 'Lucas';
echo $pessoa1->nome;
var_dump($pessoa1);
echo "<br>";
echo $pessoa2->nome;
var_dump($pessoa2);
$pessoa3 = new Pessoa;
var_dump($pessoa3);
echo '<hr>';

$x = 1;
$y = $x;
$y = 10;
echo $y;
echo "<br>";
echo $x;