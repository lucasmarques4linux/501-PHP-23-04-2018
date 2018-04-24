<?php 

class Pessoa
{
	// private $propriedades = [];
	public function __get($atributo)
	{
		// if (isset($this->propriedades[$atributo])) {
		// 	return $this->propriedades[$atributo];
		// }
		// echo "<p>Estou tentando acessar o atributo {$atributo}</p>";
	}

	public function __set($atributo,$valor)
	{
		// $this->propriedades[$atributo] = $valor;
		// echo "<p>Estou tentando atribuir o  valor {$valor} no atributo {$atributo}</p>";
	}
}
echo '<pre>';
$pessoa = new Pessoa;
$pessoa->nome = 'Lucas';
echo '<br>';
echo $pessoa->nome;
echo '<hr>';
var_dump($pessoa);