<?php 

// Class Calc
// Métodos - somar, subtrair,multiplicar e dividir
// Exceções
// somar - Não permitir número negativos, Não pertitir resultado maior que 50
// subtrair - Não permitir resultado menor que zero
// multiplicar - Não permitir multiplicação por zero, Não permitir resultado maior que 50
// dividir - Não permitir divisão por zero, Não permitir divisão de zero


class NumerosNegativosException extends Exception {}
class NumerosMaiorCinquentaException extends Exception {}
class NaoPodeDividirPorZeroException extends Exception {}
class NaoPodeDividirZeroException extends Exception {}
class NaoPodeMultiplicarZeroException extends Exception {}

class Calc
{
	public function somar( int $a, int $b)
	{
		if ($a < 0 || $b < 0) {
			throw new NumerosNegativosException;			
		}
		if ($a + $b > 50) {
			throw new NumerosMaiorCinquentaException;
			
		}
		return $a + $b;
	}
	public function subtrair( int $a, int $b)
	{
		if ($a - $b < 0 ) {
			throw new NumerosNegativosException;			
		}
		return $a - $b;
	}
	public function multiplicar( int $a, int $b)
	{
		if ($a == 0 || $b == 0) {
			throw new NaoPodeMultiplicarZeroException;			
		}
		if ($a * $b > 50) {
			throw new NumerosMaiorCinquentaException;			
		}
		return $a * $b;
	}
	public function dividir( int $a, int $b)
	{
		if ($a == 0) {
			throw new NaoPodeDividirZeroException;			
		}
		if ($b == 0) {
			throw new NaoPodeDividirPorZeroException;			
		}
		return $a / $b;
	}
}

$calc = new Calc();
echo '<pre>';
try {
	echo $calc->somar(25,26);
}
catch (NumerosNegativosException $e) {
	echo 'NumerosNegativosException';
}
catch (NumerosMaiorCinquentaException $e) {
	echo 'NumerosMaiorCinquentaException';
}
catch (NaoPodeDividirPorZeroException $e) {
	echo 'NaoPodeDividirPorZeroException';
}
catch (NaoPodeDividirZeroException $e) {
	echo 'NaoPodeDividirZeroException';
}
catch (NaoPodeMultiplicarZeroException $e) {
	echo 'NaoPodeMultiplicarZeroException';
}
echo '<hr>';
try {
	echo $calc->subtrair(10,11);
}
catch (NumerosNegativosException $e) {
	echo 'NumerosNegativosException';
}
catch (NumerosMaiorCinquentaException $e) {
	echo 'NumerosMaiorCinquentaException';
}
catch (NaoPodeDividirPorZeroException $e) {
	echo 'NaoPodeDividirPorZeroException';
}
catch (NaoPodeDividirZeroException $e) {
	echo 'NaoPodeDividirZeroException';
}
catch (NaoPodeMultiplicarZeroException $e) {
	echo 'NaoPodeMultiplicarZeroException';
}
echo '<hr>';
try {
	echo $calc->multiplicar(0,11);
}
catch (NumerosNegativosException $e) {
	echo 'NumerosNegativosException';
}
catch (NumerosMaiorCinquentaException $e) {
	echo 'NumerosMaiorCinquentaException';
}
catch (NaoPodeDividirPorZeroException $e) {
	echo 'NaoPodeDividirPorZeroException';
}
catch (NaoPodeDividirZeroException $e) {
	echo 'NaoPodeDividirZeroException';
}
catch (NaoPodeMultiplicarZeroException $e) {
	echo 'NaoPodeMultiplicarZeroException';
}