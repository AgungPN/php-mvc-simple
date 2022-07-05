<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\FlashMessage;
use App\Core\Validation;
use App\Exception\DatabaseException;
use App\interfaces\ControllerInterface;

/** @author Agung Prasetyo Nugroho <agungpn33@gmail.com> */
class Mahasiswa extends Controller implements ControllerInterface
{
	private string $title = "Mahasiswa";

	public function index()
	{
		$data["title"] = $this->title;
		$data["students"] = $this->model("MahasiswaModel")->getAllMahasiswa();
		$this->view("mahasiswa/index", $data);
	}

	public function search()
	{
		$textSearch = $_POST["search"];
		$data["title"] = $this->title;
		$data["students"] = $this->model("MahasiswaModel")->where("nama", "LIKE", "%" . $textSearch . "%")->getListMahasiswa();
		$this->view("templates/header", $data);
		$this->view("mahasiswa/index", $data);
		$this->view("templates/footer");
	}

	public function create()
	{
		$data["title"] = $this->title;
		$this->view("templates/header", $data);
		$this->view("mahasiswa/create");
		$this->view("templates/footer");
	}

	private function rules($source, Validation $validate, ?int $escapeId = null): Validation
	{
		$validate->check($source, [
			"name" => [
				"required" => true,
				"min" => 5,
				"max" => 60,
			],
			"nim" => [
				"required" => true,
				"length" => 9,
				"unique" => ["table" => "mahasiswa", "field" => "nim", "escapeId" => $escapeId],
			],
			"email" => [
				"required" => true,
				"unique" => ["table" => "mahasiswa", "field" => "email", "escapeId" => $escapeId],
			],
			"vocational" => [
				"required" => true,
			],
		]);
		return $validate;
	}

	public function store()
	{
		$validate = new Validation();
		$validate = $this->rules($_POST, $validate);
		if (!empty($validate->error())) {
			$errors = $validate->error();
			FlashMessage::setFlashMessageArray("error",$errors);
			return $this->create();
		}
		try {
			if ($this->model("MahasiswaModel")->create($_POST) > 0)
				FlashMessage::setFlashMessage("success", "Data berhasil ditambahkan!", "Berhasil");
			else
				FlashMessage::setFlashMessage("error", "Data gagal ditambahkan!", "Gagal");
		} catch (DatabaseException $th) {
			FlashMessage::setFlashMessage("error", "{$th->getMessage()}", "Gagal");
		}
		header("Location: " . BASEURL . "/mahasiswa");
		exit;
	}

	public function show($id)
	{
		$getStudent = $this->model("MahasiswaModel")->getMahasiswaById($id);
		$data["title"] = $this->title;
		$data["student"] = $getStudent;
		$this->view("templates/header", $data);
		$this->view("mahasiswa/show", $data);
		$this->view("templates/footer");
	}

	public function edit($id)
	{
		$getStudent = $this->model("MahasiswaModel")->getMahasiswaById($id);
		$data["title"] = $this->title;
		$data["student"] = $getStudent;

		$this->view("templates/header", $data);
		$this->view("mahasiswa/edit", $data);
		$this->view("templates/footer");
	}

	public function update()
	{
		$validate = new Validation();
		$validate = $this->rules($_POST, $validate, $_POST['id']);

		if (!empty($validate->error())) {
			$errors = $validate->error();
			FlashMessage::setFlashMessageArray("error", $errors);
			return $this->edit($_POST['id']);
		}

		try {
			if ($this->model("MahasiswaModel")->update($_POST))
				FlashMessage::setFlashMessage("success", "Data berhasil ditambahkan", "berhasil");
			else
				FlashMessage::setFlashMessage("error", "Data gagal ditambahkan");
		} catch (\Throwable $th) {
			FlashMessage::setFlashMessage("error", "{$th->getMessage()}");
		}
		header("Location: " . BASEURL . '/mahasiswa');
		exit;
	}

	public function destroy($id)
	{
		$result = $this->model("MahasiswaModel")->delete($id);
		if ($result > 0)
			FlashMessage::setFlashMessage("success", "Data berhasil dihapus!", "Berhasil");
		else
			FlashMessage::setFlashMessage("error", "Data gagal dihapus!", "Gagal");
		header("Location: " . BASEURL . "/mahasiswa");
		exit;
	}
}
