<?php

namespace App\Model;

use App\Core\Database;
use DateTime;
use DateTimeZone;

class MahasiswaModel
{
	private Database $db;
	private string $table = "mahasiswa",
		$where = "";
	private $value;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllMahasiswa(): ?array
	{
		return $this->db->query("SELECT nama,id FROM mahasiswa")->getList();
	}

	public function getMahasiswaById(int $id)
	{
		$result = $this->db->query("SELECT * FROM {$this->table} WHERE id=:id")
			->singleBind("id", $id)->execute()->getOne();
		return $result;
	}

	public function getListMahasiswa(): ?array
	{
		$result = $this->db->query("SELECT * FROM {$this->table} " . $this->where)->singleBind("" . array_keys($this->value)[0], array_values($this->value)[0])->execute()->getList();
		return $result;
	}

	// in PHP 8 it will error, because we can't add default value in middle param
	public function where(string $param, ?string $operator = "=", $value): self
	{
		$this->where = "WHERE $param $operator :$param";
		$this->value = [$param => $value];
		return $this;
	}

	private function getDateNow(?string $format = "Y-m-d H:i:s")
	{
		/* 
		VERSI PROCEDURAL:
		date_default_timezone_set(TIME_ZONE);
		return date($format); 
		*/

		$date = new DateTime("now", new DateTimeZone(TIME_ZONE));
		return $date->format($format);
	}

	public function create($request): ?int
	{

		$createdAt = $this->getDateNow();
		$updatedAt = $this->getDateNow();
		$result =
			$this->db->query("INSERT INTO {$this->table} (nama,nim,email,jurusan,created_at,updated_at) VALUES (:name,:nim,:email,:jurusan,:created_at,:updated_at)")
			->bind([
				"name" => $request["name"],
				"nim" => $request["nim"],
				"email" => $request["email"],
				"jurusan" => $request["vocational"],
				"created_at" => $createdAt,
				"updated_at" => $updatedAt
			])
			->execute()->rowCount();
		return $result;
	}

	public function update($request)
	{
		$updatedAt = $this->getDateNow();
		$result =
			$this->db->query("UPDATE {$this->table} SET nama=:name, nim=:nim, email=:email, jurusan=:jurusan,updated_at=:updated_at WHERE id=:id")
			->bind([
				"name" => $request["name"],
				"nim" => $request["nim"],
				"email" => $request["email"],
				"jurusan" => $request["vocational"],
				"updated_at" => $updatedAt,
				"id" => $request["id"]
			])->execute()->rowCount();
		return $result;
	}

	public function delete(int $id): ?int
	{
		$result = $this->db->query("DELETE FROM {$this->table} WHERE id=:id")
			->singleBind("id", $id)->execute()->rowCount();
		return $result;
	}
}
