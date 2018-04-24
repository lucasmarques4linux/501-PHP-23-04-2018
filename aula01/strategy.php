<?php 

//http://dontpad.com/strategy

interface FreteStrategy
{
	public function calcular(int $preco);
}

class FreteNormal implements FreteStrategy
{
	public function calcular(int $preco)
	{
		echo 'Frete Normal';
		return 2 + $preco;		
	}
}
class FreteExpresso implements FreteStrategy
{
	public function calcular(int $preco)
	{
		echo 'Frete Expresso';
		return 5 + $preco;	
	}
}
class FreteTurbo implements FreteStrategy
{
	public function calcular(int $preco)
	{
		echo 'Frete Turbo';
		return 10 + $preco;	
	}
}
class Test implements FreteStrategy
{
	public function calcular(int $preco){ return 0;}
	public function test(){}
}
class Pedido
{
	public $frete;
	public $preco;

	public function __construct(FreteStrategy $frete, int $preco = 0)
	{
		$this->frete = $frete;
		$this->preco = $preco;
		// if ($tipoFrete == 'normal') {
		// 	echo 'Frente Normal';
		// } else if ($tipoFrete == 'expresso'){
		// 	echo 'Frete Expresso';
		// } else if ($tipoFrete == 'turbo'){
		// 	echo 'Frete Turbo';
		// } else {
		// 	echo 'Nenhum frete selecionado';
		// }
	}
	public function calcularTotalPedido()
	{
		return $this->frete->calcular($this->preco);
	}
}
$frete = new Test();
$pedido = new Pedido($frete,50);
echo $pedido->calcularTotalPedido();