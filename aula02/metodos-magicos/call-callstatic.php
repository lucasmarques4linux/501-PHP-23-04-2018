<?php 

// class Pessoa
// {
// 	// public function setNome($nome){ echo $nome;}
// 	public function __call($metodo, array $parametros)
// 	{
// 		echo "<p>Tentando executar o método: {$metodo}";
// 		print_r($parametros);
// 	}
// 	public static function __callStatic($metodo, array $parametros)
// 	{
// 		echo "<p>Tentando executar o método estático: {$metodo}";
// 		print_r($parametros);	
// 	}
// }

// $pessoa = new Pessoa;

// $pessoa->setNome('Lucas');
// echo '<hr>';
// Pessoa::setNome('Lucas');

class Conta
{
	private $saldo = 0;
	private $titular;
	private $numero;
	private $agencia;

	public function __call($metodo, array $parametros)
	{
		$atributo = lcfirst(substr($metodo, 3));
		$acao     = substr($metodo, 0,3);

		echo $acao . ' : ' . $atributo . '<br>';

		print_r($parametros);
		echo '<br>';
		
		switch ($acao) {
			case 'get':
				return $this->$atributo ;
				break;
			case 'set':
				$this->$atributo = $parametros[0];
				break;
			default:
				echo 'erro';
				break;
		}
	}
}
echo '<pre>';
$conta = new Conta;
var_dump($conta);
$conta->setTitularConta('Lucas');
echo $conta->getTitular();