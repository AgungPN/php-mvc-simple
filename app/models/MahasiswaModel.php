<?php

namespace App\Model;

use App\Core\Database;

class MahasiswaModel
{
    private $db;

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
        $result = $this->db->query("SELECT * FROM mahasiswa WHERE id=:id")
            ->bind("id", $id)->execute()->getOne();
        return $result;
    }
}
