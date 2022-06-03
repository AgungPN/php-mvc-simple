<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Interfaces\ControllerInterface;

class Mahasiswa extends Controller implements ControllerInterface
{
	private $title = "Mahasiswa";

	public function index()
	{
		$data["title"] = $this->title;
		$data["mahasiswa"] = $this->model("MahasiswaModel")->getAllMahasiswa();
		$this->view("templates/header", $data);
		$this->view("mahasiswa/index", $data);
		$this->view("templates/footer");
	}
}
