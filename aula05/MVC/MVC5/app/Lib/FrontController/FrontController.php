<?php 

namespace Lib\FrontController;

class FrontController
{
	public function run()
	{
		//?r=home
		// user/edit/10
		// /user/edit/10 -> ERRO
		$rota = $_GET['r'] ?? 'home';
		
		$rota = explode('/', $rota);

		$controller = $rota[0] ?? 'home';

		$action = $rota[1] ?? 'index';

		// $id = null;
		// if (isset($rota[2])) {
		// 	$id = $rota[2];
		// } else if (isset($_GET['id'])){
		// 	$id = $_GET['id'];
		// }
		$id = $rota[2] ?? $_GET['id'] ?? null;

		$controller = 'Controller\\' . ucfirst($controller) . 'Controller';

		// new Controller/HomeController
		$objController = new $controller();

		// Controller/HomeController->index();
		// Controller/UserController->edit(10);
		$objController->$action($id);
	}
}