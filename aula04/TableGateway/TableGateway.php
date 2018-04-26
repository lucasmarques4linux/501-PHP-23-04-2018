<?php 

require 'Conexao.php';

class TableGateway
{

	private $con;

	public function __construct()
	{
		$this->con = Conexao::getInstance();
	}

	private function bind(PDOStatement $stmt, array $data)
	{
		foreach ($data as $key => $value) {
			$stmt->bindValue(':'.$key,$value);
		}
		return $stmt;
	}

	public function insert(string $table, array $data)
	{
		foreach ($data as $key => $value) {
			$keys[] = $key;
			$params[] = ":{$key}";
		}
		
		$keys = implode(',', $keys);
		$params = implode(',', $params);

		$sql = "INSERT INTO {$table} ({$keys}) VALUES ({$params})";

		try {
			$this->con->beginTransaction();

			$stmt = $this->con->prepare($sql);

			$stmt = $this->bind($stmt,$data);

			$stmt->execute();

			$this->con->commit();
		} catch (PDOException $e) {
			$this->con->rollback();
		}

	}
	public function update(string $table, array $data, string $where)
	{
		foreach ($data as $key => $value) {
			$sets[] = "{$key}=:{$key}";
		}

		$sets = implode(',', $sets);

		$sql = "UPDATE {$table} SET {$sets} WHERE {$where}";
	
		try {
			$this->con->beginTransaction();

			$stmt = $this->con->prepare($sql);

			$stmt = $this->bind($stmt,$data);

			$stmt->execute();

			$this->con->commit();
		} catch (PDOException $e) {
			$this->con->rollback();
		} 
	}
	public function delete(string $table, string $where)
	{
		$sql = "DELETE FROM {$table} WHERE {$where}";

		try {
			$this->con->beginTransaction();

			$this->con->exec($sql);

			$this->con->commit();
		} catch (PDOException $e) {
			$this->con->rollback();	
		}
	}
	public function find(string $table,string $keys = '*', string $where)
	{
		$sql = "SELECT {$keys} FROM {$table} WHERE {$where}";

		$stmt = $this->con->query($sql);

		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
	public function findAll(
		string $table, 
		string $keys = '*',
		string $where = null,
		string $filter = null,
		string $order = null,
		int $limit = null
		)
	{
		$sql = "SELECT {$keys} FROM {$table}";
		if($where){
			$sql .= " WHERE {$where}";
		}
		if ($filter && $where) {
			$sql .= " AND $filter";
		}
		if ($order) {
			$sql .= "ORDER BY {$order}";
		}
		if ($limit) {
			$sql .= " LIMIT {$limit}";
		}

		$stmt = $this->con->query($sql);

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}

// (new TableGateway())->insert('users',[
// 										'name' => 'Lucas',
// 										'email' => 'lucas@lucas.com',
// 										'pass' => md5('123')
// 									]);
// (new TableGateway())->update('users',['name' => 'Lucas M'],'id=12');
// (new TableGateway())->delete('users','id=11');
// print_r((new TableGateway())->find('users','*','id=3'));
// print_r((new TableGateway())->findAll('users'));