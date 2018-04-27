<?php 

class Model
{
	public function getData()
	{
		return 'Olá MVC1';
	}
}

class Controller
{
	private $model;

	// Quando new Controller
	// Instanciar a classe Model
	public function __construct()
	{
		$this->model = new Model();
	}

	// Quando rodar a aplicação
	// Vamos pegar dados da model
	// Incluir nossa view
	public function run()
	{
		$data = $this->model->getData();
		echo $data;
	}
}


(new Controller())->run();