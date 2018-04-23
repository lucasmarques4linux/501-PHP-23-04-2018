<?php 

interface ContaInterface
{
	public function sacar(int $valor);
	public function depositar(int $valor);
}

class Conta implements ContaInterface
{
	public function sacar(int $valor){}
	public function depositar(int $valor){}
}