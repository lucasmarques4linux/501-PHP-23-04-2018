<?php 

abstract class Conta
{
	public final function sacar(){}
}

final class ContaCorrente extends Conta{

	public function sacar(){}
}