<?php 

class Impressora
{
	public function imprimir(DocGenericoInterface $doc)
	{
		$conteudo = $doc->getConteudo();
		echo $conteudo;
	}
}

interface DocGenericoInterface
{
	public function getConteudo();
}

class Documento implements DocGenericoInterface
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

class Planilha implements DocGenericoInterface
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