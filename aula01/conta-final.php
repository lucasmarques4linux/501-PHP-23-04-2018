<?php 

abstract class Conta
{
	public final function sacar(){} // Não pode ser sobreescrito
}

// Classe Final não pode ter filhos
final class ContaCorrente extends Conta{

	// public function sacar(){} 
}