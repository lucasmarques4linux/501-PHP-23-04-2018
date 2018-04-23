<?php 

// Classe Conta
// Atributos
// saldo, numero conta;
// Métodos
// sacar, depositar, verSaldo
// Instanciar a classe e atribuir valores aos atributos
// Manipular os valores usando os métodos criados
// Mostrar na tela a seguinte mensagem
// Saldo atual da conta 'x' é 'y';

class Conta
{
	public $saldo;
	public $numConta;

	public function sacar(int $valor){
		if ($valor <= $this->saldo) {
			$this->saldo -= $valor;
		} else {
			echo 'Saldo Indisponível';
		}
	}
	public function depositar(int $valor){
		$this->saldo += $valor;
	}
	public function verSaldo(){
		return $this->saldo;
	}	
}

$conta = new Conta();
$conta->numConta = rand(100,999) . '-' . rand(0,9);
$conta->depositar(1000);
$conta->sacar(300);
echo 'O Saldo atual da conta : ' . $conta->numConta . ' é ' . $conta->verSaldo();