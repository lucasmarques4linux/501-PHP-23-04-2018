<?php 

require_once dirname(__DIR__).'/Db/conexao.php';

class Users
{
	public static function listAll(string $db = 'mysql')
	{
		$con = Conection::getInstance($db);

		$sql = "SELECT * FROM users";

		$stmt = $con->query($sql);

		$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $users;
	}

	public static function list(string $db = 'mysql',int $id)
	{
		$con = Conection::getInstance($db);

		$sql = "SELECT * FROM users WHERE id=:id";

		$stmt = $con->prepare($sql);

		$stmt->bindValue(':id',$id);
		$stmt->execute();

		$user = $stmt->fetch(PDO::FETCH_ASSOC);

		return $user;
	}

	public static function save(string $db = 'mysql',array $data)
	{
		if (isset($data['id'])) {
			$sql = "UPDATE users SET name=:name,email=:email WHERE id=:id";
		} else {
			$sql = "INSERT INTO users (name,email,pass) VALUES (:name,:email,:pass)";
		}
		try {
			$con = Conection::getInstance($db);
			$con->beginTransaction();			
			$stmt = $con->prepare($sql);

			$stmt->bindValue(':name',$data['name']);
			$stmt->bindValue(':email',$data['email']);
			
			if (isset($data['id'])) {
				$stmt->bindValue(':id',$data['id']);
			} else {
				$stmt->bindValue(':pass',md5($data['pass']));
			}

			$stmt->execute();
			$con->commit();
		} catch (PDOException $e) {
			$con->rollback();
			echo "error: ". $e->getMessage();
		}
	}

	public static function delete(string $db = 'mysql', int $id)
	{
		$sql = "DELETE FROM users WHERE id=:id";	
		try {
			$con = Conection::getInstance($db);
			$con->beginTransaction();			
			$stmt = $con->prepare($sql);
			
			$stmt->bindValue(':id',$id);

			$stmt->execute();
			$con->commit();
		} catch (PDOException $e) {
			$con->rollback();
			echo "error: ". $e->getMessage();
		}
	}
}
