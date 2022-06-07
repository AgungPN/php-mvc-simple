<?php

namespace App\Model;

use App\Core\Database;
use DateTime;
use DateTimeZone;
class MahasiswaModel
{
	private Database $db;
	private string $table = "mahasiswa";

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllMahasiswa(): ?array
	{
		$this->db->query("SELECT nama,id FROM mahasiswa");
		return $this->db->getList();
	}

	public function getMahasiswaById(int $id)
	{
		$result = $this->db->query("SELECT * FROM {$this->table} WHERE id=:id")
			->singleBind("id", $id)->execute()->getOne();
		return $result;
	}

	public function create($request): ?int
	{
		/* 
		VERSI PROCEDURAL:
		date_default_timezone_set("Asia/Jakarta");
		date("Y-m-d H:i:s"); 
		*/

		$date = new DateTime("now", new DateTimeZone(TIME_ZONE));
		$createdAt = $date->format("Y-m-d H:i:s");
		$updatedAt = $date->format("Y-m-d H:i:s");
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
	public function delete(int $id): ?int
	{
		$result = $this->db->query("DELETE FROM {$this->table} WHERE id=:id")
			->singleBind("id", $id)->execute()->rowCount();
		return $result;
	}
}
