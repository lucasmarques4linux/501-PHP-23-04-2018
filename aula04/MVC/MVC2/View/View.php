<?php 

namespace View;

class View
{
	public function render(array $data)
	{
		extract($data);
		unset($data);
		include 'src/hello.php';
	}
}