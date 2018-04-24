<?php 

require 'conexao.php';

// $sql = "INSERT INTO users (name,email,pass) VALUES (?,?,?);"

$sql = "INSERT INTO users (name,email,pass) VALUES (:name,:email,:pass)";

try {
	$dbPostgres->beginTransaction();
	
	$stmt = $dbPostgres->prepare($sql);

	$stmt->bindValue(':name','Thiago');
	$stmt->bindValue(':email','thiago@gmail.com');
	$stmt->bindValue(':pass',md5('123'));

	$stmt->execute();
	$dbPostgres->commit();
} catch (PDOException $e) {
	$dbPostgres->rollback();
	echo "erro: ". $e->getMessage();
}
