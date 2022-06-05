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
		$data["students"] = $this->model("MahasiswaModel")->getAllMahasiswa();
		$this->view("templates/header", $data);
		$this->view("mahasiswa/index", $data);
		$this->view("templates/footer");
	}

	public function show($id)
	{
		$getStudent = $this->model("MahasiswaModel")->getMahasiswaById($id);
		$data["title"] = $this->title;
		$data["student"] = $getStudent;
		$this->view("templates/header",$data);
		$this->view("mahasiswa/show",$data);
		$this->view("templates/footer");
	}
}
