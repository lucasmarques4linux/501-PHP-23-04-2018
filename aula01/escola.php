<?php 

// Classe Aluno
// Atributos - nome, email
// Métodos - __construct,getNome, getEmail;

class Aluno
{
	private $nome;
	private $email;

	public function __construct(string $nome,string $email)
	{
		$this->nome = $nome;
		$this->email = $email;
	}

	public function getNome()
	{
		return $this->nome;
	}
	public function setNome(string $nome)
	{
		if (count($nome) <= 3 ) {
			
		}
		$this->nome = $nome;
	}
	public function getEmail()
	{
		return $this->email;
	}
}

// Classe Turma
// Atributos - curso, periodo
// Métodos - __construct, getCurso, getPeriodo

class Turma
{
	public $curso;
	public $periodo;

	public function __construct(string $curso, string $periodo)
	{
		$this->curso = $curso;
		$this->periodo = $periodo;
	}

	public function getCurso()
	{
		return $this->curso;
	}
	public function getPeriodo()
	{
		return $this->periodo;
	}
}

// Classe Matricula
// Atributos - aluno, turma;
// Métodos - __construct, getAluno,getTurma

class Matricula
{
	public $aluno;
	public $turma;

	public function __construct(Aluno $aluno,Turma $turma)
	{
		$this->aluno = $aluno;
		$this->turma = $turma;
	}
}
echo '<pre>';
$lucas = new Aluno('Lucas','lucas@lucas.com');
$turma = new Turma('PHP', 'diurno');
echo $lucas->getNome();
// $lucas->nome = 'Lucas Cesar Marques';
echo $lucas->getNome();
// echo '<br>';
// echo $turma->getCurso();
// echo '<br>';
// $matricula = new Matricula($lucas,$turma);
// var_dump($matricula);
// echo $matricula->aluno->getNome();
// echo '<br>';
// echo $matricula->turma->getCurso();