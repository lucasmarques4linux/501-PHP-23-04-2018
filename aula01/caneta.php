<?php 

// Classe Caneta
class Caneta
{
	// Atributos/Propriedades
	public $cor;
	public $marca;
	public $tampada = true;

	// Métodos
	public function escrever(string $texto)
	{
		return 'Estou escrevendo: ' . $texto;
	}
	public function destampar()
	{
		$this->tampada = false;
	}
	public function tampar()
	{
		$this->tampada = true;
	}
	public function verCor()
	{
		return $this->cor;
	}
}

echo '<pre>';

$azul = new Caneta();
$vermelha = new Caneta();
// var_dump($azul);
// var_dump($vermelha);
$azul->cor = 'Azul';
$vermelha->cor = 'Vermelha';
$azul->marca = 'Bic';
$vermelha->marca = 'Outra marca';

$azul->destampar();
var_dump($azul);
var_dump($vermelha);

echo '<hr>';
echo $azul->escrever('Meu Segundo Objeto');
echo '<br>'.$vermelha->verCor();