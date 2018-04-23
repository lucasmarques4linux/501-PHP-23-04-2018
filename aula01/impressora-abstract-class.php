<?php 

class Impressora
{
	public function imprimir(DocGenerico $doc)
	{
		$conteudo = $doc->getConteudo();
		echo $conteudo;
	}
}

abstract class DocGenerico
{
	public abstract function getConteudo();
}

class Documento extends DocGenerico
{
	public $conteudo;

	public function __construct(string $conteudo)
	{
		$this->conteudo = $conteudo;
	}
	public function getConteudo()
	{
		return $this->conteudo;
	}
}

class Planilha extends DocGenerico
{
	public $conteudo;

	public function __construct(array $conteudo)
	{
		foreach ($conteudo as $linha) {
			$this->conteudo .= $linha .'<br>';
		}
	}
	public function getConteudo()
	{
		return $this->conteudo;
	}
}

$documento = new Documento('4linux');
$imp = new Impressora();
$imp->imprimir($documento);
echo '<hr>';
$planilha = new Planilha(['4linux','php','501']);
$imp->imprimir($planilha);
// $imp->imprimir('String qualquer'); //ERRO