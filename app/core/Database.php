<?php

namespace App\Core;

use App\Interfaces\DatabaseInterface;
use \PDO;
use \PDOException;

class Database implements DatabaseInterface
{
	private $dbh;
	private $stmt;
	private $host = HOST;
	private $dbName = DB_NAME;
	private $username = USERNAME;
	private $password = PASSWORD;

	public function __construct()
	{
		// data source name
		$dsn = "mysql:host={$this->host};dbname={$this->dbName};";
		// DOCUMENT option https://www.php.net/manual/en/pdo.setattribute.php
		$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
		try {
			$this->dbh = new PDO($dsn, "{$this->username}", "{$this->password}", $options);
		} catch (PDOException $err) {
			die($err->getMessage());
		}
	}

	public function query(string $query): Database
	{
		$this->stmt = $this->dbh->prepare($query);
		return $this;
	}

	public function bind(string $param, $value, ?string $type = null): Database
	{
		if (is_null($type)) {
			if (is_int($value))
				$type = PDO::PARAM_INT;
			elseif (is_bool($value))
				$type = PDO::PARAM_BOOL;
			elseif (is_null($value))
				$type = PDO::PARAM_NULL;
			elseif (is_string($value))
				$type = PDO::PARAM_STR;
			else
				$type = FALSE;
		}
		if ($type)
			$this->stmt->bindValue($param, $value, $type);
		return $this;
	}

	public function execute(): Database
	{
		$this->stmt->execute();
		return $this;
	}

	public function getList(): ?array
	{
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function getOne()
	{
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_OBJ);
	}

	public function numRows(): ?int
	{
		$this->execute();
		return $this->stmt->rowCount();
	}
}
