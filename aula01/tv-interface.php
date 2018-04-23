<?php 

interface TvInterface
{
	public function aumentaVolume();
	public function diminuiVolume();
	public function liga();
	public function desliga();
	public function trocarCanal(int $novoCanal);
}

class Tv implements TvInterface
{
	public $volume = 10;
	public $canal = 5;
	public $estado = 'OFF';

	public function aumentaVolume()
	{
		$this->volume ++;
		echo "<p>Aumentando volume para : {$this->volume}</p>";
	}
	public function diminuiVolume()
	{
		$this->volume --;
		echo "<p>Diminuindo volume para : {$this->volume}</p>";
	}
	public function trocarCanal(int $novoCanal)
	{
		$this->canal = $novoCanal;
		echo "<p>Novo Canal: {$this->canal}</p>";
	}
	public function liga()
	{
		$this->estado = 'ON';
		echo "<p>A TV ligou</p>";
		echo "<p>Canal Atual: {$this->canal}</p>";
	}
	public function desliga()
	{
		$this->estado = 'OFF';
		echo "<p>A TV desligou</p>";
	}
}

$tv = new Tv;
$tv->liga();
$tv->aumentaVolume();
$tv->aumentaVolume();
$tv->aumentaVolume();
$tv->diminuiVolume();
$tv->trocarCanal(13);
$tv->desliga();