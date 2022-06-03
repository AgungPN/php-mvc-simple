<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Interfaces\ControllerInterface;

class Home extends Controller implements ControllerInterface
{
	private $title = "Home";

	public function index()
	{
		$data["title"] = $this->title;
		$data["name"] = $this->model("UserModel")->getUser();
		$this->view("templates/header", $data);
		$this->view("home/index", $data);
		$this->view("templates/footer");
	}
}
