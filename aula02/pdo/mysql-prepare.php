<?php 

require 'conexao.php';

$sql = "INSERT INTO users (name,email,pass) VALUES (?,?,?)";

echo '<pre>';
$usuarios = array(
		[
		'Heath Ledger',
		'heathledger@tortor.com',
		'80dph2sh'
		],
		[
		'Alfie Allen',
		'alfie.allen@donec.com',
		'x7v7c6py'
		],
		[
		'Audrey Hepburn',
		'audrey_hepburn@pulvinar.com',
		'091ugvio'
		],
		[
		'Jose Hepburn',
		'josehepburn@hotmail.com ',
		'091ugvio'
		]
	);

	// foreach ($usuarios as $usuario) {
	// 	print_r($usuario);
	// }

try {
	$dbMysql->beginTransaction();
	
	$stmt = $dbMysql->prepare($sql);

	foreach ($usuarios as $usuario) {
		echo "<p>$usuario[0]</p>";
		$stmt->execute($usuario);
	}

	$dbMysql->commit();
} catch (PDOException $e) {
	$dbMysql->rollback();
	echo "erro: ". $e->getMessage();
}
