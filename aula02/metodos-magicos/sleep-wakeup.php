<?php 


class Conexao
{
	public $host;
	public $user;
	public $pass;

	public function conectar()
	{
		$link = "{$this->host} / {$this->user} / {$this->pass}";
		echo "<br>{$link}";
	}
	public function __sleep()
	{
		return array('host','user','pass');
	}

	public function __wakeup()
	{
		if (isset($this->host,$this->user,$this->pass)) {
			$this->conectar();
		}
	}
}

$conexao = new Conexao();
$conexao->host = 'localhost';
$conexao->user = 'lucas';
$conexao->pass = '123';

$conexao->conectar();

$serializado = serialize($conexao);

echo '<hr>';
echo $serializado;

echo '<hr>';

$conexao2 = unserialize($serializado);
var_dump($conexao2);