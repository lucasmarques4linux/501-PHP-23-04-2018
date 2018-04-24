<?php 

class Caneta
{
	public static $tamanho;
	private $cor;

	public function __construct(string $cor, int $tamanho = 10)
	{
		$this->cor = $cor;
		self::$tamanho = $tamanho;
	}
	public function getCor()
	{
		return $this->cor;
	}
	public function getTamanho()
	{
		return self::$tamanho;
	}
}

echo "<pre>";
// echo Caneta::$tamanho;
$azul = new Caneta('azul');
$vermelha = new Caneta('vermelha');
// var_dump($azul);
echo $azul->getTamanho();
Caneta::$tamanho = 50;
echo '<br>';
// var_dump($vermelha);
echo $vermelha->getTamanho();
echo '<br>';
echo $azul->getTamanho();