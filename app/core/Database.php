<?php

namespace App\Core;

use App\Interfaces\DatabaseInterface;
use App\Exception\DatabaseException;
use \PDO;
use \PDOException;
use PDOStatement;

/** @author Agung Prasetyo Nugroho <agungpn33@gmail.com> */
class Database implements DatabaseInterface
{
	private PDOStatement $stmt;
	private PDO $dbh;
	private string $host = DB_HOST,
		$dbName = DB_NAME,
		$username = DB_USERNAME,
		$password = DB_PASSWORD;

	public function __construct()
	{
		/** @var string data source name */
		$dsn = "mysql:host={$this->host};dbname={$this->dbName};";
		// DOCUMENT option https://www.php.net/manual/en/pdo.setattribute.php
		$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
		try {
			$this->dbh = new PDO($dsn, "{$this->username}", "{$this->password}", $options);
		} catch (PDOException $err) {
			die($err->getMessage());
		}
	}

	public function query(string $query): self
	{
		$this->stmt = $this->dbh->prepare($query);
		return $this;
	}

	public function singleBind(string $param, $value, ?string $type = null): self
	{
		if (is_null($type)) $type = $this->setTypeValue($value);

		if ($type) $this->stmt->bindValue($param, $value, $type);
		return $this;
	}

	public function bind(array $data): self
	{
		foreach ($data as $key => $value) {
			$type = $this->setTypeValue($value);
			if ($type) $this->stmt->bindValue($key, $value, $type);
		}
		return $this;
	}

	private function setTypeValue($value): int
	{
		if (is_int($value)) $type = PDO::PARAM_INT;
		elseif (is_bool($value)) $type = PDO::PARAM_BOOL;
		elseif (is_null($value)) $type = PDO::PARAM_NULL;
		elseif (is_string($value)) $type = PDO::PARAM_STR;
		else throw new \Exception("type not valid");

		return $type;
	}

	public function execute(): self
	{
		try {
			$this->stmt->execute();
		} catch (\Throwable $th) {
			throw new DatabaseException("Terjadi Masalah!");
		}
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

	public function rowCount(): ?int
	{
		return $this->stmt->rowCount();
	}
}
