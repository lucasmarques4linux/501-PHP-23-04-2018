<?php 

class NaoPodeDividirPorZeroException extends Exception{}
class NaoPodeDividirZeroException extends Exception{}

echo '<pre>';

function dividir(int $a,int $b)
{
	if ($a === 0) {
		throw new NaoPodeDividirZeroException;		
	}
	if ($b === 0) {
		throw new NaoPodeDividirPorZeroException;		
	}

	echo $a /$b;
}

try {
	dividir(0,2);
} 
catch (NaoPodeDividirZeroException $e)
{
	echo 'Não pode dividir 0';
} 
catch (NaoPodeDividirPorZeroException $e)
{
	echo 'Não pode dividir por 0';
} 
catch (Exception $e)
{
	echo $e->getMessage();
}