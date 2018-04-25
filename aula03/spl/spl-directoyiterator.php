<?php 

$dirs = new DirectoryIterator('/var/www/html/501/aula01');

foreach ($dirs as $dir) {
	if (!$dir->isDot()) {
		echo $dir . '<br>';
	}
}