<?php 

// Classe abstrata Conta
// Atributos
// saldo, titular, status
// Métodos
// sacar - Recebe um valor por parametro e se houver saldo, remove do saldo
// abstrato depositar - Recebe um valor por parametro e na CC adiciona o valor ao saldo, na CP adicionao valor mais 1 ao saldo
// final verSaldo - retorna o valor do saldo atual
// abstrato gerarNumConta - Na CC gerar algo parecido com 'CC: xxx-xx' e na CP gerar 'CP: xxx-xx';
// abstrato abrirConta - Se CC tem que depositar 50 reais, se CP tem que depositar 100 reais.
// fecharConta - O saldo tem que estar zerado, caso possua débitos ou  dinheiro na conta, avisar.
// Class ContaCorrente
// Filha de Conta
// Atributos
// numConta, chequeEspecial
// Método
// depositar,  gerarNumConta , sacar - se saldo insuficiente, habilitar Cheque Especial e diminuir 1 real no saldo para cada saque.
// Class ContaPoupanca
// Filha de Conta
// Atributos
// numConta
// Método
// depositar,  gerarNumConta

abstract class Conta
{
	public $saldo;
	public $numConta;
	public $titular;
	public $status = false;

	public abstract function gerarNumConta();
	public abstract function abrirConta();

	public function depositar(int $valor){
		if (!$this->status) {
			echo 'Conta está fechada';
		} else {
			$this->saldo += $valor;
		}
	}
	public function sacar(int $valor){
		if (!$this->status) {
			echo 'Conta está fechada';
		} else if ($this->saldo >= $valor) {
			$this->saldo -= $valor;
		} else {
			echo 'Saldo Insuficiente';
		}
	}
	public function fecharConta(){
		
		if ($this->saldo > 0 ) {
			echo 'Você precisa sacar '.$this->saldo;
		} else if ($this->saldo < 0) {
			echo 'Você está em débtido de '.$this->saldo;
		} else {
			$this->status = false;
			echo 'Conta Fechada';
		}
	}
	final function verSaldo(){
		if (!$this->status) {
			echo 'Conta está fechada';
		} else {
			echo $this->saldo;
		}
	}
}

class ContaCorrente extends Conta
{
	public $chequeEspecial;

	public function gerarNumConta(){
		$this->numConta = 'CC:'.rand(100,999).'-'.rand(10,99);
	}
	public function abrirConta(int $valor = 50){
		if ($this->status) {
			echo 'Conta já está aberta';
		} else {
			$this->status = true;
			$this->gerarNumConta();
			$this->depositar($valor);
		}
	}
	public function sacar(int $valor){
		if (!$this->status) {
			echo 'Conta está fechada';
		} else if ($this->saldo >= $valor){
			$this->saldo -= $valor;
		} else {
			$this->chequeEspecial = true;
			$this->saldo -= $valor + 1;
		}
	}
}

final class ContaPoupanca extends Conta
{
	public function gerarNumConta(){
		$this->numConta = 'CP:'.rand(100,999).'-'.rand(10,99);
	}
	public function abrirConta(){
		if ($this->status) {
			echo 'Conta já está aberta';
		} else {
			$this->status = true;
			$this->gerarNumConta();
			$this->depositar(100);
		}
	}
	public function depositar(int $valor){
		if (!$this->status) {
			echo 'Conta está fechada';
		} else {
			$this->saldo += $valor + 1;	
		}
		
	}
}
echo '<pre>';
$cc = new ContaCorrente();
$cc->titular = 'Lucas';
$cc->abrirConta();
$cc->depositar(100);
$cc->sacar(200);
$cc->fecharConta();
echo '<hr>';
$cp = new ContaPoupanca();
$cp->titular = 'João';
$cp->abrirConta();
$cp->depositar(100);
$cp->sacar(250);
$cp->fecharConta();
echo '<hr>';
var_dump($cc);
var_dump($cp);