<?php 

require 'conexao.php';

// $sql = "INSERT INTO users (name,email,pass) VALUES ('Lucas','lucasmarques73@hotmail.com',MD5('123'))";

// $sql = "INSERT INTO users (name,email,pass) VALUES ('José','jose@hotmail.com',MD5('123'))";

// $sql = "INSERT INTO users (name,email,pass) VALUES ('Claudio','claudio@hotmail.com',MD5('123'))";

// $sql = "INSERT INTO users (name,email,pass) VALUES ('Paulo','paulo@hotmail.com',MD5('123'))";

// $sql = "UPDATE users SET pass=MD5('123456') WHERE id=4";

// $sql = "DELETE FROM users WHERE id = 4";

// echo $dbPostgres->exec($sql);

try {
	$dbPostgres->beginTransaction();
	
	$sql = "INSERT INTO users (name,email,pass) VALUES ('Lucas','lucasmarques73@hotmail.com',MD5('123'))";

	echo $dbPostgres->exec($sql);
	$dbPostgres->commit();
} catch (PDOException $e) {
	$dbPostgres->rollback();
	echo "erro: ". $e->getMessage();
}

$sql = "SELECT * FROM users";

$stmt = $dbPostgres->query($sql);

// FETCH_ASSOC - Array associativo
// FETCH_NUM - Array indice númerico
// FETCH_OBJ - Objeto Generico
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

// var_dump($stmt);

echo '<pre>';
foreach ($users as $register) {
	print_r($register);
}

