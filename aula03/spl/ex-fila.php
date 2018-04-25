<?php 

function limparTela()
{
	// sleep(1);
	system('clear');
}

function menu()
{
	do {
		echo '-----------------------' . PHP_EOL;
		echo '-   1 - atender       -' . PHP_EOL;
		echo '-   2 - add pedido    -' . PHP_EOL;
		echo '-   3 - lista pedidos -' . PHP_EOL;
		echo '-   0 - sair          -' . PHP_EOL;
		echo '-----------------------' . PHP_EOL;

		$op = readline('Digite uma opcao: ');


	} while ($op < 0 || $op > 3 );
	return $op;
}

$fila = new SplQueue();

do {
	$op = menu();

	switch ($op) {
		case '1':
			if (count($fila) > 0) {
				echo 'Atendendo o pedido :' . $fila->dequeue() . PHP_EOL;
			} else {
				echo 'Atendemos Todos.' . PHP_EOL;
			}
			
			readline('Pressione para continuar');
			limparTela();
			break;
		case '2':
			$pedido = readline('Digite o pedido: ');
			$fila->enqueue($pedido);
			echo 'Pedido Adicionado com Sucesso!!!' . PHP_EOL;
			readline('Pressione para continuar');
			limparTela();
			break;
		case '3':
			$cont = 1;
			foreach ($fila as $pedido) {
				echo  $cont . " - " . $pedido . PHP_EOL;
				$cont++;
			}
			readline('Pressione para continuar');
			limparTela();
			break;
		default:
			return false;
			break;
	}
} while ($op != 0);
