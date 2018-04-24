<?php 

trait Calculadora
{
	public function somar(int $num1, int $num2)
	{
		return $num1 + $num2;
	}
	public function subtrair(int $num1, int $num2)
	{
		return $num1 - $num2;
	}
	public function dividir(int $num1, int $num2)
	{
		return $num1 / $num2;
	}
	public function multiplicar(int $num1, int $num2)
	{
		return $num1 * $num2;
	}
}

trait Test
{
	public function test(){return false;}
}


class Pessoa
{
	use Calculadora;
	use Test;

	public function getIdade()
	{
		return $this->subtrair(2018,1993);
	}
}

$lucas = new Pessoa();
echo $lucas->getIdade();