<?php 

// Classe Conta
// Classe ContaCorrente herda Conta
// Classe ContaPoupanca herda Conta

abstract class Conta
{
	public $saldo;

	public function sacar(){return 'Sacando';}
	public function depositar(){return 'Depositando';}
	public function verSaldo(){return $this->saldo;}
}

class ContaCorrente extends Conta{
	public function sacar(){ return 'Sacando + juros';}
}
class ContaPoupanca extends Conta{}

// $conta = new Conta();
$cc = new ContaCorrente();
$cp = new ContaPoupanca();
echo '<pre>';
var_dump($cc);
var_dump($cp);
echo '<hr>';
echo $cc->sacar();
echo '<br>';
echo $cp->sacar();