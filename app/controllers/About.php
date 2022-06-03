<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Interfaces\ControllerInterface;

class About extends Controller implements ControllerInterface
{
	private $title = "About";

	public function index(string $name = "agung", string $profession = "mahasiswa"): void
	{
		$data["title"] = $this->title;
		$this->view("templates/header", $data);
		// $this->view("about/index", ["name" => $name, "profession" => $profession]);
		$this->view("about/index", compact("name", "profession"));
		$this->view("templates/footer");
	}

	public function page(): void
	{
		$data["title"] = $this->title;
		$this->view("templates/header", $data);
		$this->view("about/page");
		$this->view("templates/footer");
	}
}
