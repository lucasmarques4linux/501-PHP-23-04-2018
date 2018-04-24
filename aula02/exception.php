<?php 

echo '<pre>';

function dividir(int $a,int $b)
{
	if ($a === 0) {
		throw new Exception("Não podemos dividr 0",2);		
	}
	if ($b === 0) {
		throw new Exception("Não pode dividir por Zero",1);		
	}

	echo $a /$b;
}


try {
	dividir(2,2);
} catch (Exception $e) {
	// echo 'Erro: Pegando exceção';
	var_dump($e);
	echo '<hr>';
	var_dump($e->getMessage());
	echo '<br>';
	var_dump($e->getCode());
	echo '<br>';
	var_dump($e->getTraceAsString());
}