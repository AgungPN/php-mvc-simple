<?php

namespace App\Model;

class UserModel
{
	private $name = "Agung Prasetyo Nugroho";

	public function getUser()
	{
		return $this->name;
	}
}
