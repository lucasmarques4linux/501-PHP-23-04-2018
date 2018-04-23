<?php 

abstract class Conta
{
	public $saldo;

	public abstract function sacar();
}

class ContaCorrente extends Conta{
	public function sacar(){}
}
class ContaPoupanca extends Conta{
	public function sacar(){}
}

