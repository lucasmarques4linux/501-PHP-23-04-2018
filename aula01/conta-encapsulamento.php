<?php 

abstract class Conta
{
	private $saldo;
	private $numConta;
	private $titular;
	private $status = false;

	public function __construct(string $nome, int $saldoInicial = 0)
	{
		$this->titular = $nome;
		$this->saldo = $saldoInicial;
		$this->abrirConta();
	}

	public function getSaldo()
	{
	    return $this->saldo;
	}	
	public function setSaldo($saldo)
	{
	   $this->saldo = $saldo;
	}
	public function getNumConta()
	{
	    return $this->numConta;
	}	
	public function setNumConta($numConta)
	{
	   $this->numConta = $numConta;
	}
	public function getTitular()
	{
	    return $this->titular;
	}
	public function setTitular($titular)
	{
	    $this->titular = $titular;
	}
	public function getStatus()
	{
	    return $this->status;
	}
	public function setStatus($status)
	{
	    $this->status = $status;
	}
	protected abstract function gerarNumConta();
	protected abstract function abrirConta();

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
	final public function verSaldo(){
		if (!$this->status) {
			echo 'Conta está fechada';
		} else {
			echo $this->saldo;
		}
	}
}

class ContaCorrente extends Conta
{
	private $chequeEspecial;

	public function getChequeEspecial()
	{
	    return $this->chequeEspecial;
	}
	public function setChequeEspecial($chequeEspecial)
	{
	    $this->chequeEspecial = $chequeEspecial;
	}

	protected function gerarNumConta(){
		$this->setNumConta('CC:'.rand(100,999).'-'.rand(10,99));
	}
	protected function abrirConta(int $valor = 50){
		if ($this->getStatus()) {
			echo 'Conta já está aberta';
		} else {
			$this->setStatus(true);
			$this->gerarNumConta();
			$this->depositar($valor);
		}
	}
	public function sacar(int $valor){
		if (!$this->getStatus()) {
			echo 'Conta está fechada';
		} else if ($this->getSaldo() >= $valor){
			$saldo = $this->getSaldo(); 
			$this->setSaldo($saldo -= $valor);
		} else {
			$this->setChequeEspecial(true);
			$saldo = $this->getSaldo(); 
			$this->setSaldo($saldo -= $valor + 1);
		}
	}
}

final class ContaPoupanca extends Conta
{
	protected function gerarNumConta(){
		$this->setNumConta('CP:'.rand(100,999).'-'.rand(10,99));
	}
	public function abrirConta(){
		if ($this->getStatus()) {
			echo 'Conta já está aberta';
		} else {
			$this->setStatus(true);
			$this->gerarNumConta();
			$this->depositar(100);
		}
	}
	public function depositar(int $valor){
		if (!$this->getStatus()) {
			echo 'Conta está fechada';
		} else {
			$saldo = $this->getSaldo();
			$this->setSaldo($saldo += $valor + 1);	
		}
		
	}
}
echo '<pre>';
$cc = new ContaCorrente('Lucas');
$cc->depositar(100);
$cc->sacar(200);
$cc->fecharConta();
echo '<hr>';
$cp = new ContaPoupanca('Joao');
$cp->depositar(100);
$cp->sacar(250);
$cp->fecharConta();
echo '<hr>';
var_dump($cc);
var_dump($cp);