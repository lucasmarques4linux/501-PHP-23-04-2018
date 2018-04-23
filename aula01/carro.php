<?php 

// Classe Carro
// Atributos cor,marca,velocidade,marcha;
// Métodos 
// acelerar 	 - aumenta a velocidade;
// freiar   	 - diminui a velocidade;
// trocarMarcha  - recebe uma marcha e altera o atributo
// verVelocidade - retorna a velocidade atual
// verMarcha	 - retorna a marcha atual
// Instanciar dois objetos
// Manipular eles, usando os métodos criados.

class Carro
{
	public $cor;
	public $marca;
	public $velocidade;
	public $marcha;

	public function acelerar()
	{
		$this->velocidade += 10;
	}
	public function freiar()
	{
		$this->velocidade -= 10;
	}
	public function trocarMarcha(int $novaMarcha)
	{
		$this->marcha = $novaMarcha;
	}
	public function verVelocidade()
	{
		return $this->velocidade;
	}
	public function verMarcha()
	{
		return $this->marcha;
	}
}

echo '<pre>';
$fusca = new Carro();
$fusca->cor  = 'Preto';
$fusca->marca = 'VW';
var_dump($fusca);
echo '<hr>';
$fusca->acelerar();
$fusca->acelerar();
$fusca->acelerar();
var_dump($fusca);
echo '<hr>';
$fusca->trocarMarcha(3);
var_dump($fusca);
echo '<hr>';
echo 'Velocidade Atual: ' . $fusca->verVelocidade();
echo '<br>';
echo 'Marcha Atual: ' . $fusca->verMarcha();