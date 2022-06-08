<?php

namespace App\Core;

class Controller
{
	public function view(string $view,  $data = [])
	{
		// mengekstrak array assoc dari $data menjadi variable
		extract($data, EXTR_SKIP);
		require_once '../app/view/' . $view . '.php';
	}

	/**
	 * call model class 
	 *
	 * @param string $model name class model
	 */
	public function model($model)
	{
		require_once "../app/models/$model.php";
		$classModel = "\\App\\Model\\".$model;
		return new $classModel; // langsung instansiasi class model
	}
}
